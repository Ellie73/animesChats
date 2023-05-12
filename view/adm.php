<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do administrador</title>
</head>
<body>

    <h2 style="margin-bottom:30px">Usuários cadastrados no sistema</h2>

    <?php
    if (!isset($_GET["idusuario"]) || $_GET["idusuario"] == 0) {
    ?>
        <table border="1" width="1300px">
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
                        echo "style='background-color:#B4BAF2'";
                    } ?>>
                    <td><?= $usuario["id_usuario"] ?></td>
                    <td><?= $usuario["nome"] ?></td>
                    <td><?= $usuario["email"] ?></td>
                    <td><?php if ($usuario["situacaoUsuario"] == 1) {
                            echo "Ativo";
                        } else {
                            echo "<p style='color:red;margin:0'>Inativo</p>";
                        } ?></td>
                    <td><?php if ($usuario["perfil"] == "U") {
                            echo "Usuário";
                        } else {
                            echo "<p style='color:darkred;margin:0'>Administrador</p>";
                        } ?></td>
                    <td>
                        <a href="?idusuario=<?= $usuario["id_usuario"] ?>" style="color:blue">Alterar</a>
                        <a href="../control/deletarUsuario.php?idusuario=<?= $usuario["id_usuario"] ?>&nome=<?= $usuario["nome"] ?>" style="background-color:red;border-radius:5px solid black;color:white;cursor:pointer">Excluir</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    <?php
    } else {
        //consultar usuario
        require_once "../model/DAO/usuarioDAO.php";
        $usuarioConn = new usuarioDAO();
        $id = $_GET["idusuario"];
        $usuario = $usuarioConn->pesquisarUsuario($id);
    ?>
        <!-- alterar usuario -->
        <form action="../control/alterarUsuario.php" method="POST" class="form-alterar-usuario">
            <input type="text" name="idusuario" value="<?= $id ?>" hidden>
            <a href="?idusuario=0" style="float:right;color:#424874;font-size:25px;font-weight:bold">Fechar</a>
            <h3 style="border-bottom:1px solid;margin-bottom:20px;font-size:18px;margin-top:10px">Alterar Usuário</h3>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $usuario["nome"] ?>">
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" value="<?= $usuario["email"] ?>">
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
            <input type="submit" class="alterar" value="Salvar">
        </form>
    <?php
    }
    ?>
</body>

</html>