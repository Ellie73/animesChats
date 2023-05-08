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
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
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
                            <img src="img/logo02.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="./home.php">Home</a></li>
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

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <div class="normal__breadcrumb__text">
                        <h2>Cadastro</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3></h3>
                        <form action="../control/cadastrarUsuario.php" method="post">
                            <div class="input__item">
                                <input type="text" name="nome" id="nome" class="inputUser" placeholder="Nome" required>
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input type="tel" name="telefone" id="telefone" class="inputUser" placeholder="Telefone" required>
                                <span class="icon_phone"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" name="email" id="email" class="inputUser" placeholder="Email"
                                    required> 
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" placeholder="Senha" name="senha" id="senha" required>
                                <span class="icon_lock"></span>
                            </div >
                            <div class="singup_sexo">
                            <p>Gênero:</p>
                            <input type="radio" id="feminino" name="genero" value="F" required>
                            <label for="feminino">Feminino</label>
                            <br>
                            <input type="radio" id="masculino" name="genero" value="M" required>
                            <label for="masculino">Masculino</label>
                            <br>
                            <input type="radio" id="outro" name="genero" value="O" required>
                            <label for="outro">Outro</label>
                            <br><br>
                            </div>
                            <div class="input__item">
                                <input type="date" name="nascimento" id="nascimento"
                                    placeholder="Data de nascimento" required>
                                    <span class="icon_calendar"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" name="estado" id="estado" class="inputUser" placeholder="Estado"
                                    required>
                                    <span class="icon_map"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" name="cidade" id="cidade" class="inputUser" placeholder="Cidade"
                                    required>
                                <span class="icon_map"></span>
                            </div>
                            <button type="submit" class="site-btn">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->

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