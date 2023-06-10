<?php
session_start();
if (isset($_SESSION['idusuario'])) {
    // Está logado
} else {
    header("Location:./login.php");
}
if ($_SESSION['perfil'] != 'A') {
    header("Location:./home.php?msg=Acesso negado!");
}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar um novo chat</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/pesquisarMensagem.js"></script>

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
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">

</head>
<style>
        .result-item {
            background-color: #f8f9fa;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .result-label {
            font-weight: bold;
        }

        .result-value {
            font-size: 16px; /* Tamanho da fonte desejado */
        }

        .no-result {
            font-weight: bold;
            color: red;
        }
    </style>

<body style='background-color:#cccbcb'>
    <!-- Header Section Begin -->
    <?php require_once './menu.php' ?>
    <!-- Header End -->
    <br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="crud">Pesquisar mensagens pelo nome</h1>
                <p class="crud">***Mensagens ordendas pela Data e Hora de envio***</p>
                <input type="text" id="search" class="form-control mb-3" placeholder="Digite o nome do remetente">

                <div id="results"></div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>
    <?php require_once './footer.php' ?>
</body>

</html>
