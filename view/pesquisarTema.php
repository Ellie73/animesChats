<?php
session_start();
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
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php require_once './menu.php'?>
    <!-- Header End -->


    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="../home.php"><i class="fa fa-home"></i> Home</a>
                        <a href="categories.html">Categorias</a>
                        <span><a href="./pesquisarTema.php?type=<?= $_GET['type'] ?>&page=1"><?= $_GET['type'] ?></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

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
                                        <h4><?= $_GET['type'] ?></h4>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="product__page__filter">
                                        <p>Ordem:</p>
                                        <select>
                                            <option value="">A-Z</option>
                                            <option value="">1-10</option>
                                            <option value="">10-50</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                        //temas
                        require_once "../model/DAO/temaDAO.php";
                        $temaConn = new temaDAO();
                        $retorno = $temaConn->pesquisarTema($_GET["type"], $_GET["page"]);
                        foreach ($retorno as $tema) {
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?=$tema["fototema"]?>" onclick="">
                                    </div>
                                    <div class="product__item__text">
                                        <h5><a href="./tema.php?id=<?=$tema["idtema"]?>"><?=$tema["nome"]?></a></h5>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                    <div class="product__pagination">
                        <!-- <a href="#" class="current-page">1</a> -->
                        <?php
                        $tipo=$_GET["type"];
                        //contar temas
                        require_once "../model/DAO/temaDAO.php";
                        $temaConn = new temaDAO();
                        $retorno = $temaConn->contarTema($tipo);
                        $linkCount = 1; // Variável para contar o número do link
                        for ($i = 1; $i <= $retorno["total"]; $i++) {
                            // Verificar se é um múltiplo de 6 para gerar o link
                            if ($i % 6 == 0) {
                                echo '<a href="?type='.$_GET['type'].'&page='.$linkCount.'">' . $linkCount . '</a> ';
                                $linkCount++;
                            }
                        }

                        // Se o total de animes não for múltiplo de 6, exibir o último link
                        if ($retorno["total"] % 6 != 0) {
                            echo '<a href="?type='.$_GET['type'].'&page='.$linkCount.'">' . $linkCount . '</a>';
                        }
                        ?>
                        <a href="#"><i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Product Section End -->

    <?php require_once './footer.php'?>

</body>

</html>