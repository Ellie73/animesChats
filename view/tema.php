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
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/plyr.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./home.php">
                            <img src="../img/logo02.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="./index.html">Home</a></li>
                                <li><a href="">Categorias <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="./categories.html">Anime</a></li>
                                        <li><a href="./categories.html">Mangá</a></li>
                                        <li><a href="./categories.html">Manhwa</a></li>
                                        <li><a href="./categories.html">Manhua</a></li>
                                        <li><a href="./categories.html">Webtoon</a></li>
                                    </ul>
                                </li>
                                <li><a href="./blog.html">Comunidades</a></li>
                                <li><a href="./blog-details.html">Assinatura</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a href="#" class="search-switch"><span class="icon_search"></span></a>
                        <a href="./login.html"><span class="icon_profile"></span></a>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

<!-- verificação -->
<?php
if(isset($_GET['id'])) {
            $idtema=$_GET['id'];
        }else{
            header("location:home.php");
        }
// if( $_SESSION['situacaoUsuario'] != 1) {
//     header("location:home.php?error=Usuário não está logado ou está inativo");
//         exit;
//     }
?>

<!-- trazer tema -->
<?php
    require_once "../model/DAO/temaDAO.php";
    $temaConn = new temaDAO();
    $retorno = $temaConn->exibirTema($idtema);
?>
<h1><?= $retorno["nome"]; ?></h1>

<div>
    <img src="<?= $retorno["fototema"]; ?>" alt="">
    <p>Gênero:<?= $retorno["genero"]; ?></p>
    <p><?= $retorno["tipotema"] ?></p>
    <p>Ano de estreia:<?= $retorno["ano_estreia"] ?></p>
    <p>Quantidade de capítulos ou episódios:<?= $retorno["quantidade"]; ?></p>
    <p>Situação:<?= $retorno["estado"]; ?></p>
</div>
<div>
    <h2>Sinopse:</h2>
    <p><?= $retorno["sinopse"]; ?></p>
</div>    
<?php
    require_once "../model/DAO/chatDAO.php";
    $chatConn = new chatDAO();
    $retorno = $chatConn->exibirChat($idtema);
    foreach($retorno as $chat){
        echo $chat["titulo"]."<br><br>";
    }
?>
 <!-- Footer Section Begin -->
 <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p>
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script> Todos os direitos reservados 
                         </a>
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Pesquise aqui.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/player.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/mixitup.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>


</body>

</html>