<?php
session_start();
if (isset($_SESSION['idusuario'])) {
    // Está logado
} else {
    header("Location:./login.php");
}
if ($_SESSION['perfil'] != 'A' && $_SESSION['perfil'] != 'M') {
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
                    <div class="normal__breadcrumb">
                        <h2>Criar uma nova comunidade</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3></h3>
                        <form action="../control/criarComunidade.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="input__item">
                                    <input type="text" name="nome" id="nome" class="inputUser" placeholder="Nome da comunidade" maxlength="100" required>
                                    <span class="icon_pencil"></span>
                                </div>
                                <div class="inputBox">
                                    <textarea name="descricao" id="descricao" cols="80" rows="10" class="inputUser" placeholder="Descrição da comunidade..." maxlength="3000" required></textarea>
                                </div>
                                <br>
                                <h5>Tema da comunidade </h5>
                                <br>
                                <div>
                                    <select name="tema" id="tema" required>
                                        <option value="Nenhum" selected>Nenhum</option>
                                        <?php
                                        require_once "../model/DAO/temaDAO.php";
                                        $temaConn = new temaDAO();
                                        $retorno = $temaConn->listarTema();
                                        foreach ($retorno as $tema) {
                                        ?>
                                            <option value="<?= $tema['idtema'] ?>"><?= $tema['nome'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <br><br><br>
                                <h5>Escolha uma foto para sua comunidade</h5>
                                <br>
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