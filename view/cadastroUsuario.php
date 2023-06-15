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
                        <h2>Cadastrar novo usuário</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3></h3>
                        <form action="../control/cadastrarUsuario.php" method="post">
                            <div class="input__item">
                                <input type="text" name="nome" id="nome" class="inputUser" placeholder="Nome" maxlength="100" required>
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input type="tel" name="telefone" id="telefone" class="inputUser"  pattern="\[0-9]{2}\[0-9]{4,5}[0-9]{4}" placeholder="Telefone" maxlength="17" minlength="8" required>
                                <span class="icon_phone"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" name="email" id="email" class="inputUser" maxlength="100" placeholder="Email" required>
                                <span class="icon_mail"></span>
                            </div>
                            <p style="color: red;">
                            <div class="input__item">
                                <input type="password" placeholder="Senha" maxlength="100" name="senha" id="senha" required>
                                <span class="icon_lock"></span>
                            </div>
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
                                <input type="date" name="nascimento" id="nascimento" placeholder="Data de nascimento" required min="1900-01-01" max="2010-01-01">
                                <span class="icon_calendar"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" name="estado" id="estado" maxlength="100" class="inputUser" placeholder="Estado" required>
                                <span class="icon_map"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" name="cidade" id="cidade" maxlength="100" class="inputUser" placeholder="Cidade" required>
                                <span class="icon_map"></span>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" required>
                                <label class="form-check-label">Ao se registrar, você concorda com os <a href="./termos.php">Termos de Uso e de privacidade</a> do Animes-Chats</label>
                            </div>
                            <button type="submit" class="btn btn-danger">Cadastrar</button>
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

</html>