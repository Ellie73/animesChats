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
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php require_once './menu.php' ?>
    <!-- Header End -->

    <h2 style="margin-bottom:30px;text-align: center;">Usuários cadastrados no sistema</h2>
    
    <br><br>
    <?php
    if (!isset($_GET["idusuario"]) || $_GET["idusuario"] == 0) {
    ?>
        <table border="1" width="1300px" align="center">
            <tr>
                <th>ID do usuário</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Status</th>
                <th>Perfil</th>
                <th>Ações</th>
            </tr>

            <?php
            //usuarios
            require_once "../model/DAO/usuarioDAO.php";
            $usuarioConn = new usuarioDAO();
            $retorno = $usuarioConn->listarUsuarios();
            foreach ($retorno as $usuario) {
            ?>
                <!-- encontrar o usuario -->

                <tr <?php if ($usuario["perfil"] == "A") {
                        echo "style='background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(255,300,100,1))'";
                    } ?>>
                    <td><?= $usuario["id_usuario"] ?></td>
                    <td><?= $usuario["nome"] ?></td>
                    <td><?= $usuario["email"] ?></td>
                    <td><?php if ($usuario["situacaoUsuario"] == 1) {
                            echo "Ativo";
                        } else {
                            echo "Inativo";
                        } ?></td>
                    <td><?php if ($usuario["perfil"] == "U") {
                            echo "Usuário";
                        } else {
                            echo "Administrador";
                        } ?></td>
                    <td>
                        <a href="?idusuario=<?= $usuario["id_usuario"] ?>" style="color:#8B0000">Alterar</a>
                        <a href="../control/deletarUsuario.php?idusuario=<?= $usuario["id_usuario"] ?>&nome=<?= $usuario["nome"] ?>" style="background-color:red;border-radius:5px solid black;color:white;cursor:pointer">Excluir</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br><br>
        <div style="margin: auto 45%;">
    <button class="site-btn"><a href="./cadastroUsuario.php" style="color: #ffff;"> Cadastrar novo Usuário</a></button></div>
        
        
    <?php
    } else {
        //consultar usuario
        require_once "../model/DAO/usuarioDAO.php";
        $usuarioConn = new usuarioDAO();
        $id = $_GET["idusuario"];
        $usuario = $usuarioConn->pesquisarUsuario($id);
    ?>
        <!-- alterar usuario -->
        <div class="container">
            <form action="../control/alterarUsuario.php" method="POST" class="form-alterar-usuario">
                <input type="text" name="idusuario" value="<?= $id ?>" hidden> <br>
                <a href="?idusuario=0" style="float:right;color:#424874;font-size:25px;font-weight:bold">Fechar</a><br>
                <h3 style="border-bottom:1px solid;margin-bottom:20px;font-size:18px;margin-top:10px;text-align:center;font-size:large;">Alterar Usuário</h3>
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?= $usuario["nome"] ?>">
                </div>
                <div>
                    <label for="email">E-mail:</label>
                    <input type="text" id="email" name="email" value="<?= $usuario["email"] ?>">
                </div>
                <br>
                <div style="margin: auto 0.7em;">
                    <div class="row">
                        <label for="situacao">Status:</label>
                        <select name="situacao" id="situacao">
                            <?php
                            if ($usuario["situacaoUsuario"] == 1) {
                            ?>
                                <option value="1" selected>Ativo</option>
                                <option value="0">Inativo</option>
                            <?php
                            } else {
                            ?>
                                <option value="1">Ativo</option>
                                <option value="0" selected>Inativo</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div class="row">
                        <label for="perfil">Perfil:</label>
                        <select name="perfil" id="perfil">
                            <?php
                            if ($usuario["perfil"] == "U") {
                            ?>
                                <option value="U" selected>Usuário</option>
                                <option value="A">Administrador</option>
                            <?php
                            } else {
                            ?>
                                <option value="U">Usuário</option>
                                <option value="A" selected>Administrador</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br><br>
                <div>
                    <button type="submit" class="site-btn">Salvar</button>
                </div>
            </form>
        </div>
    <?php
    }
    ?> <br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <?php require_once './footer.php' ?>
</body>