<?php

//login
require_once "../model/DAO/usuarioDAO.php";
require_once "../model/DTO/usuarioDTO.php";

$email = $_POST["email"];
$senha = $_POST["senha"];
$senha = md5($senha);

//Instância do usuario
$usuario = new usuarioDTO("",$email,$senha,"","","","","","","","");
//Conexão com o data base
$usuarioConn = new usuarioDAO();
$retorno = $usuarioConn->logar($usuario);
if($retorno == null || empty($retorno)){
    header("location:../view/home.php?msg=Login ou senha invalidos!");
}else{
    if($retorno["situacaoUsuario"] == 1){
    session_start();
    $_SESSION["idusuario"] = $retorno["id_usuario"];
    $_SESSION["nome"]=$retorno["nome"];
    $_SESSION["email"]=$retorno["email"];
    $_SESSION["estado"]=$retorno["estado"];
    $_SESSION["cidade"]=$retorno["cidade"];
    $_SESSION["genero"]=$retorno["genero"];
    $_SESSION["foto"]=$retorno["foto"];
    $_SESSION["perfil"]=$retorno["perfil"];
    $_SESSION["telefone"]=$retorno["telefone"];
    $_SESSION["nascimento"]=$retorno["nascimento"];
    $_SESSION["situacaoUsuario"]=$retorno["situacaoUsuario"];
    header("location:../view/home.php?msg=Usuario logado com sucesso!");
    }else{
        header("location:../view/home.php?msg=Usuario inativo ou sem permissão para acesso!");
    }
}
