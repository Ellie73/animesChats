<?php

session_start();
//deletarUsuarioControl.php
require_once "../model/DAO/usuarioDAO.php";

// if($_SESSION["perfil"] != "A"){
//     header("location:../view/adotar.php?msg=Sem permissão para acesso!");
// }

if(!isset($_GET["idusuario"]) && !isset($_GET["nome"])){
    header("location:../view/ferramentas-adm.php?msg=Usuário não selecionado!");
}

$idusuario = $_GET["idusuario"];
$nome = $_GET["nome"];

if(!isset($_GET["deletarUsuario"])){

    echo 
   "<body style='background-color:#999'>
   <div style='border-radius:10px;background-color:white;padding:30px;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)'>
        <h3>Deseja realmente <span style='color:red;'>Excluir</span> o usuário <span style='color:red;'>$nome</span>?</h3>
        <p><b>Usuário ID:</b> $idusuario</p><br>
        <a href='?idusuario=$idusuario&nome=$nome&deletarUsuario=sim' style='background-color:red;border:0px; border-radius:5px; solid black;outline:none;color:white;cursor:pointer;text-decoration:none;padding:10px;margin:20px'>Sim</a>
        <a href='../view/adm.php' style='text-decoration:none'>Não</a>
    </div>";

}else{
    $usuarioConn = new usuarioDAO();
    //deletar usiario
    $retorno = $usuarioConn->deletarUsuario($idusuario);
    if($retorno == null || $retorno == 0){
        header("location:../view/ferramentas-adm.php?msg=Erro ao deletar usuário / login!");
    }else{
        header("location:../view/ferramentas-adm.php?msg=Usuário deletado com sucesso!");
    }

}

?>