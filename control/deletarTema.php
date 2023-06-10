<?php

session_start();
//deletarUsuarioControl.php
require_once "../model/DAO/temaDAO.php";

if($_SESSION["perfil"] != "A"){
    header("location:../view/temaCrud.php");
}

if(!isset($_GET["idtema"]) && !isset($_GET["nome"])){
    header("location:../view/temaCrud.php?msg=Tema não selecionado!");
}

$idtema = $_GET["idtema"];
$nome = $_GET["nome"];

if(!isset($_GET["deletarTema"])){

    echo 
   "<body style='background-color:#cccbcb'>
   <div style='border-radius:10px;background-color:white;padding:30px;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)'>
        <h3>Deseja realmente <span style='color:red;'>Excluir</span> o tema <span style='color:red;'>$nome</span>?</h3>
        <p><b>Tema ID:</b> $idtema</p><br>
        <a href='?idtema=$idtema&nome=$nome&deletarTema=sim' style='background-color:red;border:0px; border-radius:5px; solid black;outline:none;color:white;cursor:pointer;text-decoration:none;padding:10px;margin:20px'>Sim</a>
        <a href='../view/temaCrud.php' style='text-decoration:none'>Não</a>
    </div>";

}else{
    $temaConn = new temaDAO();
    //deletar usiario
    $retorno = $temaConn->deletarTema($idtema);
    if($retorno == null || $retorno == 0){
        header("location:../view/temaCrud.php?msg=Erro ao deletar tema!");
    }else{
        header("location:../view/temaCrud.php?msg=Tema deletado com sucesso!");
    }

}

?>