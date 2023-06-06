<?php

session_start();
//deletarComunidade.php
require_once "../model/DAO/comunidadeDAO.php";

 if($_SESSION["perfil"] != "A"){
     header("location:../view/comunidadeCrud.php");
}

    if(!isset($_GET["idcomunidade"]) && !isset($_GET["nome"])){
    header("location:../view/comunidadeCrud.php?msg=Comunidade não selecionado!");
}

$idcomunidade = $_GET["idcomunidade"];
$nome = $_GET["nome"];

if(!isset($_GET["deletarcomunidade"])){

    echo 
   "<body style='background-color:#cccbcb'>
   <div style='border-radius:10px;background-color:white;padding:30px;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)'>
        <h3>Deseja realmente <span style='color:red;'>Excluir</span> a comunidade <span style='color:red;'>$nome</span>?</h3>
        <p><b>Comunidade ID:</b> $idcomunidade</p><br>
        <a href='?idcomunidade=$idcomunidade&nome=$nome&deletarcomunidade=sim' style='background-color:red;border:0px; border-radius:5px; solid black;outline:none;color:white;cursor:pointer;text-decoration:none;padding:10px;margin:20px'>Sim</a>
        <a href='../view/comunidadeCrud.php' style='text-decoration:none'>Não</a>
    </div>";

}else{
    $comunidadeConn = new comunidadeDAO();
    //deletar comunidade
    $retorno = $comunidadeConn->deletarComunidade($idcomunidade);
    if($retorno == null || $retorno == 0){
        header("location:../view/comunidadeCrud.php?msg=Erro ao deletar comunidade");
    }else{
        header("location:../view/comunidadeCrud.php?msg=Comunidade deletada com sucesso!");
    }

}

?>