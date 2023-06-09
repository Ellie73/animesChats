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
    <link rel="stylesheet" href="../css/cadastroTema.css">
</head>
<header class="header">
    <div class="">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="./home.php">
                        <img src="../img/logo02.png" alt="Animes-Chats" >
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li id="categorias"><a href="">Categorias <span class="arrow_carrot-down"></span></a>
                                <ul class="dropdown">
                                    <li><a href="./pesquisarTema.php?type=anime&page=1">Anime</a></li>
                                    <li><a href="./pesquisarTema.php?type=manga&page=1">Mangá</a></li>
                                    <li><a href="./pesquisarTema.php?type=manhwa&page=1">Manhwa</a></li>
                                    <li><a href="./pesquisarTema.php?type=manhua&page=1">Manhua</a></li>
                                    <li><a href="./pesquisarTema.php?type=webtoon&page=1">Webtoon</a></li>
                                </ul>
                            </li>
                            <li><a href="./homeComunidade.php?page=1">Comunidades</a></li>
                            <li><a href="./assinatura.php">Assinatura</a></li>
                            <li title="Procurar"><a href="#" class="search-switch"><span class="icon_search"></span></a></li>
                            <?php
                            // Verifica se o usuário está logado 
                            if (isset($_SESSION['idusuario'])) {
                                echo '<li title="'.$_SESSION['nome'].'"><a href="./perfil.php"><img src="'.$_SESSION['foto'].'" class="rounded-circle me-3" style="width: 2em; height: 2em; object-fit: cover;"></a></li>';
                                // Se o perfil do usuário for 'A', exibe o botão de administração
                                if ($_SESSION['perfil'] == 'A') {
                                    echo '<li title="Ferramentas ADM"><a href="./ferramentas.php"><span class="icon_flowchart"></span></a></li>';
                                }
                                elseif ($_SESSION['perfil'] == 'M') {
                                    echo '<li title="Moderação"><a href="./moderador.php"><span class="icon_star"></span></a></li>';
                                }
                                if (isset($_SESSION['idusuario'])) {
                                    echo '<li title="Sair"><a href="./logout.php">Sair</a></li>';
                                }
                            } else {
                                echo '<li title="Login/Cadastre-se"><a href="./login.php"><img src="../img/usuarios/user.png" class="rounded-circle me-3" style="width: 2em; height: 2em; object-fit: cover;"></a></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>