<?php
session_start();
if (isset($_SESSION['idusuario'])) {
    // Está logado
} else {
    header("Location:./login.php");
}
if ($_SESSION['perfil'] != 'A') {
    header("Location:./home.php?msg=Acesso negado!");
}
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
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/plyr.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/cadastroTema.css">
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

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <div class="normal__breadcrumb__texto">
                        <h2>Cadastro de um novo Tema</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3></h3>
                        <form action="../control/cadastrarTema.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="input__item">
                                    <input type="text" name="nometema" id="nometema" class="inputUser" placeholder="Nome do Tema" maxlength="100" required>
                                    <span class="icon_pencil"></span>
                                </div>
                                <div class="inputBox">
                                    <textarea name="sinopse" id="sinopse" cols="80" rows="10" class="inputUser" placeholder="Sinopse" maxlength="3000" required></textarea>
                                </div>
                                <br>
                                <div class="input__item">
                                    <input type="text" name="generotema" id="generotema" class="inputUser" maxlength="100" placeholder="Gênero" required>
                                    <span class="icon_genius"></span> 
                                </div>
                                <p style="color: red;">
                                <div class="input__item">
                                    <input type="number" name="estreia" id="estreia" class="inputUser" min="1" max="2024" placeholder="Ano de estreia" required>
                                    <span class="icon_calendar"></span>
                                </div>
                                <div class="singup_sexo">
                                    <p>Tipo</p>
                                    <input type="radio" id="anime" name="tipo" value="Anime" required>
                                    <label for="anime">Anime</label>
                                    <br>
                                    <input type="radio" id="manga" name="tipo" value="Mangá" required>
                                    <label for="mangá">Mangá</label>
                                    <br>
                                    <input type="radio" id="webtoon" name="tipo" value="Webtoon" required>
                                    <label for="webtoon">Webtoon</label>
                                    <br><br>
                                </div>
                                <div class="input__item">
                                    <input type="number" name="quantidade" id="quantidade" min="1" max="2024" class="inputUser" placeholder="Quantidade de Cap/Ep" required>
                                    <span class="icon_book"></span>
                                </div>
                                <div class="inputBox">
                                    <label for="estadotema">Estado de publicação:</label>
                                </div>
                                <div>
                                    <select name="estadotema" id="estadotema" required>
                                        <option value="Em andamento" selected>Em andamento</option>
                                        <option value="Finalizado">Finalizado</option>
                                    </select>
                                </div>
                                <br><br><br>
                                <div class="inputBox">
                                    <label class="picture" for="foto" tabIndex="0">
                                        <span class="picture__image">Escolha uma foto</span>
                                    </label>
                                    <input type="file" name="foto" id="foto" required>
                                </div>
                                <p>***Somente JPG jpg jpeg png</p>
                                <br>
                            </fieldset>
                            <button type="submit" name="submit" id="submit" class="btn btn-danger">Cadastrar</button>
                            <button class="btn btn-outline-dark" onclick="window.history.back()">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->

    <?php require_once './footer.php' ?>

</body>
<script src="../js/./fotoCadastro.js"></script>
</html>