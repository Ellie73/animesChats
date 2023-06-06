<?php
if (isset($_GET['id'])) {
    $idtema = $_GET['id'];
} else {
    header("location:home.php");
}

session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar um novo chat</title>

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

<body style='background-color:#cccbcb'>
    <!-- Header Section Begin -->
    <?php require_once './menu.php' ?>
    <!-- Header End -->
    <br>
    <form action="../control/criarChatControl.php" method="post">
        <div class="inputBox" style='border-radius:10px;background-color:white;padding:30px;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)'>
            <legend style="text-align: center;"><b>CRIAR UM NOVO CHAT</b></legend> <br><br>
            <label for="titulo" class="labelInput">Título</label>
            <input type="text" name="titulo" id="titulo" class="inputUser" required>
            <input type="number" name="tema" id="tema" class="inputUser" required hidden value="<?= $idtema ?>">
            <button class="site-btn" type="submit" name="submit" id="submit">Salvar</button>
        </div>
    </form>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php require_once './footer.php' ?>
</body>

</html>