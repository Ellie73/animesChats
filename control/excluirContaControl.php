<?php

session_start();
//deletarUsuarioControl.php
require_once "../model/DAO/usuarioDAO.php";

$idusuario=$_POST['idusuario'];

$usuarioConn = new usuarioDAO();
//deletar usiario
$retorno = $usuarioConn->deletarUsuario($idusuario);
if($retorno == null || $retorno == 0){
    header("location:../view/perfil.php?msg=Erro ao deletar usuário!");
}else{
    session_destroy();
    header("location:../view/home.php?msg=Usuário deletado com sucesso!");
}

?>