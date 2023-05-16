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
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<?php
session_start();
if (isset($_GET['id'])) {
    $idtema = $_GET['id'];
} else {
    header("location:home.php");
}
// if( $_SESSION['situacaoUsuario'] != 1) {
//     header("location:home.php?error=Usuário não está logado ou está inativo");
//         exit;
//     }
if (isset($_SESSION['idusuario'])) {
    // Está logado
}else{
    header("Location:./login.php");
}

?>

<!-- trazer tema -->


<?php
require_once "../model/DAO/temaDAO.php";
$temaConn = new temaDAO();
$retorno = $temaConn->exibirTema($idtema);
if($retorno == null || empty($retorno)){
    header("location:../view/home.php?msg=Error!");}
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
                        <a href="./categorias.php">Categorias</a>
                        <span><a href="./<?= $retorno["tipotema"] ?>.php"><?= $retorno["tipotema"] ?></a></span>
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
                            <div class="anime__details__btn">
                                <a href="./criarChat.php?id=<?= $retorno["idtema"]; ?>" class="follow-btn"> Cadastrar novos tópicos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Comunidades</h5>
                        <!-- </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <a href=anime-watching.html><img src="img/anime/review-1.jpg" alt=""></a>
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                    "demons" LOL</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <a href=anime-watching.html><img src="img/anime/review-2.jpg" alt=""></a>
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <a href=anime-watching.html><img src="img/anime/review-2.jpg" alt=""></a>
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <a href=anime-watching.html><img src="img/anime/review-2.jpg" alt=""></a>
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div> -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Anime Section End -->
    <!-- 
        <?php
        // require_once "../model/DAO/chatDAO.php";
        // $chatConn = new chatDAO();
        // $retorno = $chatConn->exibirChat($idtema);
        // foreach($retorno as $chat){
        //     echo $chat["titulo"]."<br><br>";
        // }
        ?> 
-->

        <?php require_once './footer.php' ?>
        
</body>

</html>