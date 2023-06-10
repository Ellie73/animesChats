<?php
session_start();
$pesquisa = $_GET['search-input'];
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
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/plyr.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php require_once './menu.php' ?>
    <!-- Header End -->

    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Anime</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            //animes
                            require_once "../model/DAO/temaDAO.php";
                            $temaConn = new temaDAO();
                            $animes = $temaConn->buscarAnime($pesquisa);
                            if ($animes == null || $animes == 0) {
                                echo '<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__text">
                                    <h5><a>Sem resultados para "' . $pesquisa . '" em Anime :c</a></h5>
                                </div>
                            </div>
                        </div>';
                            }
                            foreach ($animes as $anime) {
                            ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <a href="./tema.php?id=<?= $anime["idtema"] ?>">
                                            <div class="product__item__pic set-bg" data-setbg="<?= $anime["fototema"] ?>">
                                            </div>
                                        </a>
                                        <div class="product__item__text">
                                            <ul>
                                                <li><?= $anime['genero'] ?></li>
                                            </ul>
                                            <h5><a href="./tema.php?id=<?= $anime["idtema"] ?>"><?= $anime["nome"] ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Mangá</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            //mangás
                            $mangas = $temaConn->buscarManga($pesquisa);
                            if ($mangas == null || $mangas == 0) {
                                echo '<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__text">
                                    <h5><a>Sem resultados para "' . $pesquisa . '" em Mangá :c</a></h5>
                                </div>
                            </div>
                        </div>';
                            }
                            foreach ($mangas as $manga) {
                            ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <a href="./tema.php?id=<?= $manga["idtema"] ?>">
                                            <div class="product__item__pic set-bg" data-setbg="<?= $manga["fototema"] ?>">
                                            </div>
                                        </a>
                                        <div class="product__item__text">
                                            <ul>
                                                <li><?= $manga['genero'] ?></li>
                                            </ul>
                                            <h5><a href="./tema.php?id=<?= $manga["idtema"] ?>"><?= $manga["nome"] ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Manhwa</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            //manhwa
                            $manhwas = $temaConn->buscarManhwa($pesquisa);
                            if ($manhwas == null || $manhwas == 0) {
                                echo '<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__text">
                                    <h5><a>Sem resultados para "' . $pesquisa . '" em Manhwa :c</a></h5>
                                </div>
                            </div>
                        </div>';
                            }
                            foreach ($manhwas as $manhwa) {
                            ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <a href="./tema.php?id=<?= $manhwa["idtema"] ?>">
                                            <div class="product__item__pic set-bg" data-setbg="<?= $manhwa["fototema"] ?>">
                                            </div>
                                        </a>
                                        <div class="product__item__text">
                                            <ul>
                                                <li><?= $manhwa['genero'] ?></li>
                                            </ul>
                                            <h5><a href="./tema.php?id=<?= $manhwa["idtema"] ?>"><?= $manhwa["nome"] ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Manhua</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            //manhua
                            $manhuas = $temaConn->buscarManhua($pesquisa);
                            if ($manhuas == null || $manhuas == 0) {
                                echo '<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__text">
                                    <h5><a>Sem resultados para "' . $pesquisa . '" em Manhua :c</a></h5>
                                </div>
                            </div>
                        </div>';
                            }
                            foreach ($manhuas as $manhua) {
                            ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <a href="./tema.php?id=<?= $manhua["idtema"] ?>">
                                            <div class="product__item__pic set-bg" data-setbg="<?= $manhua["fototema"] ?>">
                                            </div>
                                        </a>
                                        <div class="product__item__text">
                                            <ul>
                                                <li><?= $manhua['genero'] ?></li>
                                            </ul>
                                            <h5><a href="./tema.php?id=<?= $manhua["idtema"] ?>"><?= $manhua["nome"] ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Webtoon</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            //webtoon
                            $webtoons = $temaConn->buscarWebtoon($pesquisa);
                            if ($webtoons == null || $webtoons == 0) {
                                echo '<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__text">
                                    <h5><a>Sem resultados para "' . $pesquisa . '" em Webtoon :c</a></h5>
                                </div>
                            </div>
                        </div>';
                            }
                            foreach ($webtoons as $webtoon) {
                            ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <a href="./tema.php?id=<?= $webtoon["idtema"] ?>">
                                            <div class="product__item__pic set-bg" data-setbg="<?= $webtoon["fototema"] ?>">
                                            </div>
                                        </a>
                                        <div class="product__item__text">
                                            <ul>
                                                <li><?= $webtoon['genero'] ?></li>
                                            </ul>
                                            <h5><a href="./tema.php?id=<?= $webtoon["idtema"] ?>"><?= $webtoon["nome"] ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="product__page__content">
                        <div class="product__page__title">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-6">
                                    <div class="section-title">
                                        <h4>Comunidades</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            //comunidades
                            require_once "../model/DAO/comunidadeDAO.php";
                            $comunidadeConn = new comunidadeDAO();
                            $comunidades = $comunidadeConn->buscarComunidade($pesquisa);
                            if ($comunidades == null || $comunidades == 0) {
                                echo '<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__text">
                                    <h5><a>Sem resultados para "' . $pesquisa . '" em Comunidade :c</a></h5>
                                </div>
                            </div>
                        </div>';
                            }
                            foreach ($comunidades as $comunidade) {
                            ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <a href="./comunidade.php?id=<?= $comunidade["idcomunidade"] ?>">
                                            <div class="product__item__pic set-bg" data-setbg="<?= $comunidade["foto"] ?>">
                                            </div>
                                        </a>
                                        <div class="product__item__text">
                                            <ul>
                                                <li><?= $comunidade['idtema'] ?></li>
                                            </ul>
                                            <h5><a href="./comunidade.php?id=<?= $comunidade["idcomunidade"] ?>"><?= $comunidade["nome"] ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Product Section End -->

    <?php require_once './footer.php' ?>

</body>

</html>