document.getElementById('client-search').addEventListener('input', function () {
    let query = this.value;

    if (query.length > 2) {
        fetch(`/clients/search?query=${query}`)
            .then(response => response.json())
            .then(data => {
                let resultsList = document.getElementById('client-results')
                if(!resultsList){
                    console.error("Elemento 'client-results' no encontrado.");
                    return;
                }
                resultsList.innerHTML = '';
                resultsList.style.display = 'block';

                if (data.length === 0){
                    resultsList.innerHTML = '<li>No se encontraron resultados</li>'
                    return;
                }

                data.forEach(client => {
                    let listItem = document.createElement('li');
                    listItem.textContent = `${client.first_name} ${client.last_name} (${client.company})`;
                    listItem.dataset.id = client.id;
                    listItem.dataset.name = `${client.first_name} ${client.last_name}`;
                    listItem.dataset.company = client.company;

                    listItem.addEventListener('click', function (){
                        //Cargar datos del Formulario
                        let clientIdInput= document.getElementById('client-id');
                        let clientNameInput = document.getElementById('client-name');
                        let clientCompanyInput = document.getElementById('client-company');

                        if (!clientIdInput || !clientNameInput || !clientCompanyInput){
                            console.error("Campos del formulario no encontrados")
                            return;
                        }

                        //Asignar valores al formulario
                        clientIdInput.value = client.id;
                        clientNameInput.value = `${client.first_name} ${client.last_name}`;

                        //Asignar el valor de la empresa
                        if(client.company && client.company.trim() !== ''){
                            clientCompanyInput.value = client.company;
                        } else {
                            clientCompanyInput.value = "N/A";
                        }
                        //Ocultar lista de resultados
                        resultsList.style.display = 'none';
                    });
                    resultsList.appendChild(listItem);
                });
            })
            .catch(error=>{
                console.error("Error al buscar clientes:", error);
            });
    }
});
