<section class="ferramenta-aba">

<section style="width:100%">

    <h2 style="margin-bottom:30px">Usuários Cadastrados</h2>

<?php
if(!isset($_GET["idusuario"]) || $_GET["idusuario"] == 0){
?>
    <table>
        <tr>
            <th>idusuario</th>
            <th>nome</th>
            <th>email</th>
            <th>situacao</th>
            <th>perfil</th>
            <th>Opções</th>
        </tr>

    <?php
    require_once "../model/DAO/usuarioDAO.php";
    $usuarioConn = new usuarioDAO();
    $retorno = $usuarioConn->listarUsuarios();
    foreach($retorno as $usuario){
    ?>
            
        <tr <?php if($usuario["perfil"] == "A"){echo "style='background-color:#B4BAF2'";} ?>>
            <td><?=$usuario["id_usuario"]?></td>
            <td><?=$usuario["nome"]?></td>
            <td><?=$usuario["email"]?></td>
            <td><?php if($usuario["situacaoUsuario"]==1){echo "Ativo";}else{echo "<p style='color:red;margin:0'>Inativo</p>";} ?></td>
            <td><?php if($usuario["perfil"]=="U"){echo "Usuário";}else{echo "<p style='color:darkred;margin:0'>Administrador</p>";} ?></td>
            <td>
                <a href="?idusuario=<?=$usuario["id_usuario"]?>" style="color:blue">Alterar</a>
                <a href="../control/deletarUsuarioControl.php?idusuario=<?=$usuario["id_usuario"]?>&nome=<?=$usuario["nome"]?>" style="background-color:darkred;border:1px solid black;outline:none;color:white;cursor:pointer">Deletar</a>
            </td>
        </tr>
    <?php
    }
    ?>
    </table>
<?php
}else{
    require_once "../model/DAO/usuarioDAO.php";
    $usuarioConn = new usuarioDAO();
    $usuario = $usuarioConn->pesquisarUsuario($_GET["id_usuario"]);
?>
    <form action="../control/alterarUsuario.php" method="POST" class="form-alterar-usuario">
        <input type="text" name="idusuario" value="<?=$usuario["idusuario"]?>" hidden>
        <a href="?idusuario=0" style="float:right;color:#424874;font-size:25px;font-weight:bold">X</a>
        <h3 style="border-bottom:1px solid;margin-bottom:20px;font-size:18px;margin-top:10px">Alterar Usuário</h3>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?=$usuario["nome"]?>">
        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email" value="<?=$usuario["email"]?>">
        <label for="situacao">Situação:</label>
        <select name="situacao" id="situacao">
        <?php
        if($usuario["situacaoUsuario"] == 1){
        ?>
            <option value="1" selected>Ativo</option>
            <option value="0">Inativo</option>
        <?php
        }else{
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
        if($usuario["perfil"] == "U"){
        ?>
            <option value="U" selected>Usuário</option>
            <option value="A">Administrador</option>
        <?php
        }else{
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
</section>