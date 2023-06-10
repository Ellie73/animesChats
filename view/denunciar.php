<?php
session_start();
if (empty($_SESSION['idusuario'])) {
    header("location:home.php?msg=Login necessário para fazer uma denúncia");
} else {
    $idusuario = $_SESSION['idusuario'];
}

?>

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
    <div class="flex">
        <section>
            <form action="../control/denunciarControl.php" method="post">
                <h2 form-label><b>Fazer uma Denúncia</b></h2> <br><br>
                <div class="row mb-3">
                    <div class="col">
                        <label for="ocorrencia" class="form-label">Descrição:</label>
                        <textarea type="text" name="ocorrencia" id="ocorrencia" class="form-control" cols="30" rows="10" required></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="contato" class="form-label">E-mail:</label>
                        <input type="email" placeholder="E-mail para contato" name="contato" id="contato" required class="form-control">
                        <div class="row mb-3">
                        <div class="col">
                            <br>
                            <input type="hidden" name="iddenunciante" id="iddenunciante" required value="<?= $idusuario ?>">
                            <button class="btn btn-danger" type="submit" name="submit" id="submit">Denunciar</button>
                        </div>
                    </div>
                    </div>
                    
                </div>
            </form>
        </section>
    </div>
    <br><br>
    <?php require_once './footer.php' ?>
</body>

</html>