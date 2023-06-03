$(document).ready(function(){
    // função para carregar as mensagens do chat
    function carregar_mensagens(){
        var id = $("#chat").val();
        $.ajax({
            url: "../control/buscarMensagem.php?id="+id,
            method: "GET",
            success: function(data){
                $("#mensagens").html(data);
            }
        });
    }

    // carrega as mensagens a cada 1 segundo
    setInterval(function(){
        carregar_mensagens();
    }, 1000);

    //envia a mensagem para o servidor
    // $("#form-chat").submit(function(e){
    //     e.preventDefault();
    //     var conteudo = $("#conteudo").val();
    //     var chat = $("#chat").val();
    //     var remetente = $("#remetente").val();
    //     $.ajax({
    //         url: "../control/enviarMensagem.php",
    //         method: "POST",
    //         data: {conteudo: conteudo, chat: chat, remetente: remetente},
    //         success: function(){
    //             $("#conteudo").val("");
    //         }
    //     });
    // });
});