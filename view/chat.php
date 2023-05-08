<?php
if(isset($_GET['idchat'])) {
            $idchat=$_GET['idchat'];
        }else{
            header("location:home.php");
        }
if( $_SESSION['idusuario'] == null) {
    header("location:home.php?error=Usuário não está logado");
       exit;
}

$idusuario=$_SESSION['idusuario'];
?>

<!DOCTYPE html>
<html lang="ptbr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Chat em Tempo Real com PHP, JavaScript e Ajax</h1>
	<div id="mensagens"></div>
	<form id="form-chat">
		<label for="mensagem">Mensagem:</label>
		<input type="text" id="conteudo" name="conteudo">
		<button type="submit">Enviar</button>
	</form>
</body>
<script src="../js/chat.js"></script>
</html>



<style>.chat {
  display: flex;
  flex-direction: column;
  height: 500px;
  border: 1px solid #ccc;
  border-radius: 5px;
  overflow: hidden;
}

.chat-header {
  background-color: #f2f2f2;
  padding: 10px;
}

.chat-body {
  flex: 1;
  display: flex;
  flex-direction: column;
  padding: 10px;
  overflow-y: scroll;
}

.message {
  max-width: 70%;
  padding: 10px;
  margin: 10px;
  border-radius: 5px;
  word-wrap: break-word;
}

.received {
  background-color: #e6e6e6;
  align-self: flex-start;
}

.sent {
  background-color: #0084ff;
  color: #fff;
  align-self: flex-end;
}

.chat-footer {
  display: flex;
  padding: 10px;
}

.chat-footer input[type="text"] {
  flex: 1;
  padding: 10px;
  border: none;
  border-radius: 5px;
  margin-right: 10px;
}

.chat-footer button {
  background-color: #0084ff;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
</style>