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
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
</head>
<?php
session_start();
if (isset($_GET['id'])) {
    $idtema = $_GET['id'];
} elseif (empty($_GET['id'])) {
    header("location:home.php?msg=Página não encontrada!");
}
if (isset($_SESSION['idusuario'])) {
    // Está logado
} elseif (empty($_SESSION['idusuario'])) {
    header("Location:./login.php?msg=Faça login para acessar!");
}

?>

<!-- trazer tema -->


<?php
require_once "../model/DAO/temaDAO.php";
$temaConn = new temaDAO();
$retorno = $temaConn->exibirTema($idtema);
if ($retorno == null || empty($retorno)) {
    header("location:../view/home.php?msg=Página não encontrada!");
}
?>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php require_once './menu.php' ?>
    <!-- Header End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./home.php"><i class="fa fa-home"></i> Home</a>
                        <a href="#">Categorias</a>
                        <span><a href="./pesquisarTema.php?type=<?= $retorno["tipotema"] ?>&page=1"><?= $retorno["tipotema"] ?></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="<?= $retorno["fototema"]; ?>">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3><?= $retorno["nome"]; ?></h3>
                                <!-- <span>フェイト／ステイナイト, Feito／sutei naito</span> -->
                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                <span>1.029 Votes</span>
                            </div>
                            <p><?= $retorno["sinopse"]; ?></p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Tipo:</span><?= $retorno["tipotema"] ?></li>
                                            <li><span>Cap/Ep:</span><?= $retorno["quantidade"]; ?></li>
                                            <li><span>Ano de estreia:</span><?= $retorno["ano_estreia"] ?></li>
                                            <li><span>Status:</span><?= $retorno["estado"]; ?></li>
                                            <li><span>Genêro:</span><?= $retorno["genero"]; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h4>Comunidades de <?= $retorno["nome"]; ?></h4>
                            <br><br>
                            <div class="row">
                                <?php
                                //comunidades
                                require_once "../model/DAO/comunidadeDAO.php";
                                $comunidadeConn = new comunidadeDAO();
                                $comunidades = $comunidadeConn->listarComunidadesTema($idtema);
                                foreach ($comunidades as $comunidade) {
                                ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="product__item">
                                            <a href="./comunidade.php?id=<?= $comunidade["idcomunidade"] ?>">
                                                <div class="product__item__pic set-bg" data-setbg="<?= $comunidade["foto"] ?>">
                                                </div>
                                            </a>
                                            <br>
                                            <div class="product__item__text">
                                                <h5><a href="./comunidade.php?id=<?= $comunidade["idcomunidade"] ?>"><?= $comunidade["nome"] ?></a></h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                                <?php 
                                if ($comunidades==null || $comunidades==0){ echo"<h2>".$retorno["nome"]." não possui comunidades ainda</h2>";}
                                ?>
                        </div>
                    </div>

                </div>
            </div>
    </section>

    <?php require_once './footer.php' ?>

</body>

</html>