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

<body style='background-color:#cccbcb'>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php require_once './menu.php' ?>
    <!-- Header End -->

    <h1 class="crud">Temas cadastrados no sistema</h1>
    <br><br>
    <?php
    if (!isset($_GET["idtema"]) || $_GET["idtema"] == 0) {
    ?>
        <div class="container">
            <div class="table">
                <table>
                    <tr>
                        <th>ID do tema</th>
                        <th>Nome</th>
                        <th>Gênero</th>
                        <th>Ano de estreia</th>
                        <th>Estado</th>
                        <th>Tipo</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>

                    <?php
                    //temas
                    require_once "../model/DAO/temaDAO.php";
                    $temaConn = new temaDAO();
                    $retorno = $temaConn->listarTema();
                    foreach ($retorno as $tema) {
                    ?>
                        <!-- encontrar o usuario -->

                        <tr>
                            <td><?= $tema["idtema"] ?></td>
                            <td><?= $tema["nome"] ?></td>
                            <td><?= $tema["genero"] ?></td>
                            <td><?= $tema["ano_estreia"] ?></td>
                            <td><?= $tema["estado"] ?></td>
                            <td><?= $tema["tipotema"] ?></td>
                            <td>
                                <button class="btn btn-danger"><a href="?idtema=<?= $tema["idtema"] ?>" style="color:white;">Alterar</a></button>

                            </td>
                            <td>
                                <button class="btn btn-dark"><a href="../control/deletarTema.php?idtema=<?= $tema["idtema"] ?>&nome=<?= $tema["nome"] ?>" style="color:white;">Excluir</a></button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <div>
                    <button class="site-btn"><a href="./cadastroTema.php"> Cadastrar novo Tema</a></button>
                </div>
            </div>
        </div>

    <?php
    } else {
        //consultar usuario
        require_once "../model/DAO/temaDAO.php";
        $temaConn = new temaDAO();
        $id = $_GET["idtema"];
        $tema = $temaConn->verTema($id);
    ?>
        <!-- alterar usuario -->
        <div class="flex">
            <section>
                <form action="../control/alterarUsuario.php" method="POST" class="form-alterar-usuario">
                    <div>
                        <input type="text" name="idusuario" value="<?= $id ?>" hidden> <br>
                        <a href="?idusuario=0" style="float:right;color:#424874;font-size:25px;font-weight:bold">Fechar</a><br>
                        <h3 class="mb-3" style="text-align: center;">Alterar Usuário</h3>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" id="nome" name="nome" value="<?= $usuario["nome"] ?>" class="form-control">
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">E-mail:</label>
                            <input type="text" id="email" name="email" value="<?= $usuario["email"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3" style="margin: 0px 3px;">
                        <div>
                            <label for="situacao" class="form-label">Status:</label>
                        </div>
                        <div>
                            <select name="situacao" id="situacao" class="form-select">
                                <?php if ($usuario["situacaoUsuario"] == 1) : ?>
                                    <option value="1" selected>Ativo</option>
                                    <option value="0">Inativo</option>
                                <?php else : ?>
                                    <option value="1">Ativo</option>
                                    <option value="0" selected>Inativo</option>
                                <?php endif; ?>
                            </select>
                        </div>

                    </div>
                    <div class="row mb-3" style="margin: 0px 5px;">
                        <div>
                            <label for="perfil" class="form-label">Perfil:</label>
                        </div>
                        <div>
                            <select name="perfil" id="perfil" class="form-select">
                                <?php if ($usuario["perfil"] == "U") : ?>
                                    <option value="U" selected>Usuário</option>
                                    <option value="A">Administrador</option>
                                <?php else : ?>
                                    <option value="U">Usuário</option>
                                    <option value="A" selected>Administrador</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-danger">Salvar</button>
                    </div>
                </form>
            </section>
        </div>
        <br><br><br><br><br><br>
    <?php
    }
    ?>

    <?php require_once './footer.php' ?>
</body>