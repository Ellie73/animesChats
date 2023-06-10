$(document).ready(function() {
    // Captura o evento de digitação na barra de pesquisa
    $('#search').on('input', function() {
        var searchTerm = $(this).val();

        // Faz uma requisição AJAX para o arquivo de busca em tempo real
        $.ajax({
            url: '../control/pesquisarMensagemControl.php',
            type: 'GET',
            data: { search: searchTerm },
            success: function(response) {
                $('#results').html(response);
            }
        });
    });
});