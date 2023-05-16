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
    <link rel="stylesheet" href="../css/cadastroTema.css">
</head>
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
                            <li class="active"><a href="home.php">Home</a></li>
                            <li><a href="">Categorias <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    <li><a href="site/categories.html">Anime</a></li>
                                    <li><a href="site/categories.html">Mangá</a></li>
                                    <li><a href="site/categories.html">Manhwa</a></li>
                                    <li><a href="site/categories.html">Manhua</a></li>
                                    <li><a href="site/categories.html">Webtoon</a></li>
                                </ul>
                            </li>
                            <li><a href="site/blog.html">Comunidades</a></li>
                            <li><a href="site/assinatura.html">Assinatura</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="header__right">
                    <a href="#" class="search-switch"><span class="icon_search"></span></a>
                    <?php
                    // Verifica se o usuário está logado 
                    if (isset($_SESSION['idusuario'])) {
                        echo '<a href="./perfil.php"><span class="icon_profile"></span></a>';
                        // Se o perfil do usuário for 'A', exibe o botão de administração
                        if ($_SESSION['perfil'] == 'A') {
                            echo '<a href="./ferramentas.php"><span class="icon_flowchart"></span></a>';
                        }
                        if (isset($_SESSION['idusuario'])) {
                            echo '<a href="./logout.php"><span class="icon_close"></span></a>';
                        }
                    } else {
                        echo '<a href="./login.php"><span class="icon_profile"></span></a>';
                    }

                    ?>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>