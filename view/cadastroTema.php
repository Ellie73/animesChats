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
    <link rel="stylesheet" href="../css/cadastroTema.css" type="text/css">
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
                        <a href="home.php">
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
                        <a href="site/login.html"><span class="icon_profile"></span></a>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

<body>
    <main>
    <div class="container">
            <div class="row">
        <div class="box">
            <form action="../control/cadastrarTema.php" method="post" enctype="multipart/form-data">
                <div class="normal__breadcrumb__text">
                        <h2><strog> Cadastrar Tema <strong></h2>
                    </div>
                    <br>
                    <div class="inputBox">
                        <label for="nometema" class="labelInput">Nome do Tema:</label>
                        <input type="text" name="nometema" id="nometema" class="inputUser" required>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label for="email" class="labelInput">Sinopse:</label><br>
                        <textarea name="sinopse" id="sinopse" cols="80" rows="10" class="inputUser" required></textarea>
                    </div>
                    <br><br>
                    <div class="inputBox">
                    <label for="generotema" class="labelInput">Gênero</label>
                    <input type="text" name="generotema" id="generotema" class="inputUser" required>   
                    </div>
                    <br><br>
                    <div class="inputBox">
                    <label for="estreia" class="labelInput">Ano de estreia</label>
                    <input type="number" name="estreia" id="estreia" class="inputUser" min="1" max="2023" required>
                    <br><br> 
                    </div>
                    <h5>Tipo:</h5>
                    <br>
                    <input type="radio" id="anime" name="tipo" value="Anime" required>
                    <label for="anime">Anime</label>
                    <br>
                    <input type="radio" id="manga" name="tipo" value="Mangá" required>
                    <label for="manga">Mangá</label>
                    <br>
                    <input type="radio" id="webtoon" name="tipo" value="Webtoon" required>
                    <label for="webtoon">Webtoon</label>
                    <br><br>
                    <label for="quantidade">Quantidade de Episódio/Capítulos:</label>
                    <input type="number" name="quantidade" id="quantidade" required>
                    <br><br><br>
                    <div class="inputBox">
                        </select>
                        <label for="estadotema">Estado de publicação:</label>
                        <select name="estadotema" id="estadotema" required>
                            <option value="Em andamento" selected>Em andamento</option>
                            <option value="Finalizado">Finalizado</option>
                        </select>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <label class="picture" for="foto" tabIndex="0">
                            <span class="picture__image">Escolha uma foto</span>
                        </label>
                        <input type="file" name="foto" id="foto" required>
                    </div>
                    <br><br>
                <div class="btn_alinhamento">
                    <button type="submit" name="submit" id="submit" class="site-btn">Enviar</button>

                </div>

            </form>
        </div>
    <div>
        </div>
        <!--FIM 1ª DOBRA-->


    </main>
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
    <script src="../js/main.js"></script>
    <script src="../js/fotoCadastro.js"></script>
</body>


</html>