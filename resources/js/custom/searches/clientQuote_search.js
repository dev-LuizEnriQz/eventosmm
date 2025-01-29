import $ from "jquery";

$(document).ready(function (){

    //BUSQUEDA POR NOMBRE DEL CLIENTE
    $('#client_search').on('input', function(){
      const query = $(this).val();

      if(query.length >=2) { //Apartir de 2 caracteres se realizara la busqueda
          $.ajax({
              url: '/quotes/api/searchClientQuote',
              method: 'GET',
              data: { query, type: 'name'}, //Especifico para el tipo de busqueda
              success: function (data){
                  const results = $('#client-results');
                  results.empty().show();

                  if (data.length === 0) {
                      results.append('<li class="list-group-item">Sin Resultados</li>');
                  } else {
                      data.forEach(quote => {
                          results.append(`
                    <li class="list-group-item list-group-item-action"
                        data-id="${quote.id}"
                        data-name="${quote.client_name}"
                        data-folio="${quote.folio}">
                        ${quote.client_name}
                    </li>
                        `);
                    });
                  }
              },
              error: function (){
                  console.error('Error al buscar clientes.');
              }
          });
      } else {
          $('#client-results').hide();
      }
    });

    //Seleccionar el resultado de cliente
    $('#client-results').on('click', 'li', function(){
        const clientId = $(this).data('id');
        const clientName = $(this).data('name');
        const folio = $(this).data('folio');

        $('#quote-id').val(clientId);
        $('#client-name').val(clientName);
        $('#quote-folio').val(folio);

        $('#client-results').hide();
    });


    //BUSQUEDA POR FOLIO//
    $('#folio_search').on('input',function (){
        const query = $(this).val();
        console.log('busqueda por folio:', query); //Log para verificar la consulta

        if (query.length >= 2){//Apartir de 2 caracteres se realiza la busqueda
            $.ajax({
                url: '/quotes/api/searchClientQuote',
                method:'GET',
                data: {query, type: 'folio'}, //Especifica el tipo de busqueda
                success: function (data){
                    const results = $('#quote-results');
                    results.empty().show();

                    if (data.length === 0){
                        results.append('<li class="list-group-item">Sin Resultados</li>')
                    } else {
                        data.forEach(quote => {
                            results.append(`
                                <li class="list-group-item list-group-item-action"
                                    data-id="${quote.id}"
                                    data-name="${quote.client_name}"
                                    data-folio="${quote.folio}">
                                    ${quote.folio} - ${quote.client_name}
                                </li>
                            `);
                        });
                    }
                },
                error: function (){
                    console.error('Error al buscar folios.');
                }
            });
        } else {
            $('#quote-results').hide();
        }
    });

    //Seleccionar resultado de folio
    $('#quote-results').on('click', 'li', function (){
        const quoteId = $(this).data('id');
        const clientName = $(this).data('name');
        const folio = $(this).data('folio');

        $('#quote-id').val(quoteId);
        $('#quote-name').val(clientName);
        $('#quote-folio').val(folio);

        $('#quote-results').hide();
    });
});
