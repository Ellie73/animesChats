<?php
    session_start();
    if ( isset( $_GET['idchat'] ) ) {
        $chat = $_GET['idchat'];
    } else {
        header( "location:home.php" );
    }
    if ( $_SESSION['idusuario'] == null ) {
        header( "location:home.php?error=Usuário não está logado" );
        exit;
    }

    $idusuario = $_SESSION['idusuario'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Animes Chats</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/plyr.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
<input hidden id="chat" value="<?=$chat?>">
	<div id="mensagens">  </div>
	<form id="form-chat" class="form-chat">
		<label for="mensagem">Mensagem:</label>
		<input type="text" id="conteudo" name="conteudo" placeholder="Digite aqui..." autofocus required>
    <input type="text" id="chat" name="chat" value="<?= $idchat ?>" hidden>
    <input type="text" id="remetente" name="remetente" value="<?= $_SESSION['idusuario'] ?>" hidden>
		<button type="submit">Enviar</button>
	</form>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/chat.js"></script>
<script src="../js/enviarMensagem.js"></script>

</html>