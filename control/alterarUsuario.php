<?php

//alterar usuario 
require_once "../model/DAO/usuarioDAO.php";
require_once "../model/DTO/usuarioDTO.php";

if($_SESSION["perfil"] != "A"){
    header("location:../view/cadastro.php?msg=Sem permissão para entrar!");
}

$idusuario = $_POST["idusuario"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$situacao = $_POST["situacao"];
$perfil = $_POST["perfil"];

$usuario = new usuarioDTO($nome,"",$email,"");
$usuario->setIdusuario($idusuario);
$usuario->setSituacaoUsuario($situacao);
$usuario->setPerfil($perfil);

$usuarioConn = new usuarioDAO();
$retorno = $usuarioConn->alterarUsuario($usuario);

if($retorno == null || $retorno == 0){
    header("location:../view/adm.php?idusuario=$idusuario&msg=Erro ao alterar usuário!");
}else{
    header("location:../view/adm.php?idusuario=$idusuario&msg=Usuário alterado com sucesso!");
}

?>