<?php

session_start();
//deletarComunidade.php
require_once "../model/DAO/comunidadeDAO.php";
$idcriador=$_GET['idcriador'];
 if($_SESSION["perfil"] != "M"){
     header("location:../view/moderador.php");
}

    if(!isset($_GET["idcomunidade"]) && !isset($_GET["nome"])){
    header("location:../view/moderador.php?msg=Comunidade não selecionado!");
}

$idcomunidade = $_GET["idcomunidade"];
$nome = $_GET["nome"];

if(!isset($_GET["deletarcomunidade"])){

    echo 
   "<body style='background-color:#cccbcb'>
   <div style='border-radius:10px;background-color:white;padding:30px;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)'>
        <h3>Deseja realmente <span style='color:red;'>Excluir</span> a comunidade <span style='color:red;'>$nome</span>?</h3>
        <p><b>Comunidade ID:</b> $idcomunidade</p><br>
        <a href='?idcomunidade=$idcomunidade&nome=$nome&deletarcomunidade=sim&idcriador=$idcriador' style='background-color:red;border:0px; border-radius:5px; solid black;outline:none;color:white;cursor:pointer;text-decoration:none;padding:10px;margin:20px'>Sim</a>
        <a href='../view/moderador.php' style='text-decoration:none'>Não</a>
    </div>";

}else{
    if($idcriador==$_SESSION['idusuario']){
        $comunidadeConn = new comunidadeDAO();
        //deletar comunidade
        $retorno = $comunidadeConn->deletarComunidade($idcomunidade);
        if($retorno == null || $retorno == 0){
            header("location:../view/moderador.php?msg=Erro ao deletar comunidade");
        }else{
            header("location:../view/moderador.php?msg=Comunidade deletada com sucesso!");
        }
    }else{
        header("location:../view/moderador.php?msg=Sem permissão!");
    }
}

?>