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

    <div class="container mt-5">
        <h1 class="crud">Usuários cadastrados no sistema</h1>
        <br><br>
        <?php
        if (!isset($_GET["idusuario"]) || $_GET["idusuario"] == 0) {
        ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID do usuário</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Status</th>
                            <th>Perfil</th>
                            <th>Alterar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <?php
                    //usuarios
                    require_once "../model/DAO/usuarioDAO.php";
                    $usuarioConn = new usuarioDAO();
                    $retorno = $usuarioConn->listarUsuarios();
                    foreach ($retorno as $usuario) {
                        $tableRowClass = ($usuario["perfil"] == "A") ? 'table-danger' : '';
                    ?>
                        <!-- encontrar o usuario -->
                        <tbody>
                            <tr class="<?php echo $tableRowClass; ?>">
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
                                    } elseif ($usuario["perfil"] == "A") {
                                        echo "Administrador";
                                    } elseif ($usuario["perfil"] == "M") {
                                        echo "Moderador";
                                    }  ?></td>
                                <td>
                                    <a href="?idusuario=<?= $usuario["id_usuario"] ?>" style="color:white;"><button class="btn btn-danger"><i class="material-icons">create</i></button></a>
                                </td>
                                <td>
                                    <a href="../control/deletarUsuario.php?idusuario=<?= $usuario["id_usuario"] ?>&nome=<?= $usuario["nome"] ?>" style="color:white;"><button class="btn btn-dark"><i class="material-icons">delete</i></button></a>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                    }
                        ?>
                        
                </table>
                <div>

                    <button class="site-btn"><a href="./cadastroUsuario.php"><i class="material-icons">control_point</i> Cadastrar novo Usuário</a></button>
                </div>
                <br><br><br>
            </div>
    </div>

<?php
        } else {
            //consultar usuario
            require_once "../model/DAO/usuarioDAO.php";
            $usuarioConn = new usuarioDAO();
            $id = $_GET["idusuario"];
            $usuario = $usuarioConn->pesquisarUsuario($id);
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
                        <input type="text" id="nome" name="nome" value="<?= $usuario["nome"] ?>" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="text" id="email" name="email" value="<?= $usuario["email"] ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3" style="margin: 0px 3px;">
                    <div>
                        <label for="situacao" class="form-label">Status:</label>
                    </div>
                    <div>
                        <select name="situacao" id="situacao" class="form-select" required>
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
                        <select name="perfil" id="perfil" class="form-select" required>
                            <?php if ($usuario["perfil"] == "U") : ?>
                                <option value="U" selected>Usuário</option>
                                <option value="A">Administrador</option>
                                <option value="M">Moderador</option>
                            <?php elseif ($usuario["perfil"] == "A") : ?>
                                <option value="U">Usuário</option>
                                <option value="A" selected>Administrador</option>
                                <option value="M">Moderador</option>
                            <?php elseif ($usuario["perfil"] == "M") : ?>
                                <option value="U">Usuário</option>
                                <option value="A">Administrador</option>
                                <option value="M" selected>Moderador</option>
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
    <br><br>
    </div>
<?php
        }
?>
</body>
<?php require_once './footer.php' ?>