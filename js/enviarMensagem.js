document.getElementById('form-chat').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita o comportamento padrão do formulário
  
    var conteudo = document.getElementById('conteudo').value;
    var chat = document.getElementById('chat').value;
    var remetente = document.getElementById('remetente').value;
    var data = new Date().toISOString().slice(0, 10);
    var hora = new Date().toLocaleTimeString();
  
    // Cria um objeto FormData para enviar os dados do formulário
    var formData = new FormData();
    formData.append('conteudo', conteudo);
    formData.append('chat', chat);
    formData.append('remetente', remetente);
    formData.append('data', data);
    formData.append('hora', hora);
  
    // Envia os dados do formulário usando AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../control/enviarMensagem.php', true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        console.log(xhr.responseText);
        // Faça o que você precisa fazer após o envio do formulário
      } else {
        console.error('Erro ao enviar o formulário');
      }
    };
    xhr.send(formData);
  
    // Limpar o campo de conteúdo após o envio
    document.getElementById('conteudo').value = '';
  });