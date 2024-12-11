document.getElementById('client-search').addEventListener('input', function () {
    let query = this.value;

    if (query.length > 2) {
        fetch(`/clients/search?query=${query}`)
            .then(response => response.json())
            .then(data => {
                let resultsList = document.getElementById('client-results')
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
                        document.getElementById('client-id').value = client.id;
                        document.getElementById('client-name').textContent = `${client.first_name} ${client.last_name}`;
                        document.getElementById('client-company').textContent = client.company;

                        //Mostrar detalles y ocultar resultados
                        document.getElementById('client-details').style.display = 'block';
                        resultsList.style.display = 'none';
                    })
                    resultsList.appendChild(listItem);
                })
            })
    }
})
