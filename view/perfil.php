<?php
session_start();
require_once "../model/DAO/usuarioDAO.php";
require_once "../model/DTO/usuarioDTO.php";
if (!isset($_SESSION["idusuario"])) {
    header("location:login.php?msg=Faça login!");
}
$usuarioConn = new usuarioDAO();
$usuario = $usuarioConn->pesquisarUsuario($_SESSION["idusuario"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>

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

<body style='background-color:#cccbcb'>
    <!-- Header Section Begin -->
    <?php require_once './menu.php' ?>
    <!-- Header End -->

    </head>

    <body>

        <section class="flex">
            <section>
                <div>
                    <h1 style="font-weight: 700;"><span style="color:tomato;">P</span>ERFIL <i class="material-icons">insert_emoticon</i></h1>
                </div>
                <form action="../control/perfilControl.php" method="POST" enctype="multipart/form-data">
                    <input type="file" id="foto" name="foto" src="<?= $usuario["foto"] ?>" hidden>

                    <div class="d-flex mb-3">
                        <div style="margin-right: 20px;cursor: pointer;">
                            <img id="preview-foto" title="Selecione uma foto..." src="<?= $usuario["foto"] ?>" class="rounded-circle me-3" style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <div>
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" id="nome" name="nome" value="<?= $usuario["nome"] ?>" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="email" class="form-label">E-mail:</label>
                            <input type="text" id="email" name="email" value="<?= $usuario["email"] ?>" class="form-control">
                        </div>
                        <div class="col">
                            <label for="telefone" class="form-label">Telefone/Celular:</label>
                            <input type="tel" id="telefone" name="telefone" value="<?= $usuario["telefone"] ?>" pattern="\[0-9]{2}\[0-9]{4,5}[0-9]{4}" maxlength="17" minlength="8" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="estado" class="form-label">Estado:</label>
                            <input type="text" id="estado" name="estado" value="<?= $usuario["estado"] ?>" class="form-control">
                        </div>
                        <div class="col">
                            <label for="cidade" class="form-label">Cidade:</label>
                            <input type="text" id="cidade" name="cidade" value="<?= $usuario["cidade"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="genero" class="form-label">Gênero:</label>
                            <div class="form-check">
                                <input type="radio" id="genero" name="genero" value="F" class="form-check-input" <?php if ($usuario['genero'] == 'F') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                                <label for="genero" class="form-check-label">Feminino</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="genero" name="genero" value="M" class="form-check-input" <?php if ($usuario['genero'] == 'M') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                                <label for="genero" class="form-check-label">Masculino</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="genero" name="genero" value="O" class="form-check-input" <?php if ($usuario['genero'] == 'O') {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                                <label for="genero" class="form-check-label">Outro</label>
                            </div>
                        </div>
                        <div class="col">
                            <label for="nascimento" class="form-label">Data de nascimento:</label>
                            <input type="date" id="nascimento" name="nascimento" value="<?= $usuario["nascimento"] ?>" class="form-control" min="1900-01-01" max="2010-01-01">
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" required>
                        <input type="hidden" value="<?= $usuario["foto"] ?>" id="fotoantiga" name="fotoantiga" required>
                        <label class="form-check-label">Ao clicar em "Salvar" você está ciente de que os seus dados serão <b>alterados</b> do sistema.</label>
                    </div>
                    <input type="submit" name="upload" value="Salvar" class="btn btn-danger">
                </form>
            </section>
            <br><br>
            <aside>
                <section>
                <form action="../control/alterarSenha.php" method="POST" onsubmit="confereSenha('formRedefinicaoSenha')" id="formRedefinicaoSenha">

                        <h3>Redefinição de senha</h3>
                        <table class="mb-3">
                            <tr>
                                <td>Senha</td>
                                <td>Confirme a senha</td>
                            </tr>
                            <tr>
                                <input type="text" value="<?= $_SESSION["idusuario"] ?>" name="idusuario" id="idusuario" hidden>
                                <td><input type="password" id="senhacad" name="senha" required minlength="5" class="form-control"></td>
                                <td><input type="password" id="confirmSenhacad" required class="form-control"></td>
                            </tr>
                        </table>
                        <p class="alerta-senha"><?php if (isset($senha)) {
                                                    echo $senha;
                                                } ?></p>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" required>
                            <label class="form-check-label">Ao clicar em "Alterar senha" você está ciente de que os sua senha será <b>alterada</b> do sistema.</label>
                        </div>
                        <input type="submit" value="Alterar senha" class="btn btn-danger">
                        <div class="submit-div" style="display:none">Alterar senha</div>
                    </form>

                    <form action="../control/excluirContaControl.php" method="POST">
                        <h3>Exclusão de conta</h3>
                        <div class="form-check mb-3">
                            <input type="hidden" value="<?= $_SESSION["idusuario"] ?>" name="idusuario" id="idusuario" required>
                            <input type="checkbox" class="form-check-input" required>
                            <label class="form-check-label">Ao clicar em "Excluir conta" você está ciente de que os seus dados serão <b>excluídos</b> do sistema.</label>
                        </div>
                        <input type="submit" value="Excluir conta" class="btn btn-danger">
                    </form>
                </section>
            </aside>
        </section>
        <?php require_once './footer.php' ?>

    </body>
    <script src="../js/foto.js"></script>
    <script src="../js/senha.js"></script>

</html>