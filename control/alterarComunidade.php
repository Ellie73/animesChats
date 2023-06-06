<?php

//alterar comunidade
require_once "../model/DAO/comunidadeDAO.php";
require_once "../model/DTO/comunidadeDTO.php";

$idcomunidade = $_POST["idcomunidade"];
$nome = $_POST["nome"];
$idtema = $_POST["tema"];
$situacao = $_POST["situacao"];
$descricao = $_POST["descricao"];

$comunidade = new comunidadeDTO($nome, $descricao, $idtema, $situacao, "", "");
$comunidade->setIdcomunidade($idcomunidade);

$comunidadeConn = new comunidadeDAO();
$retorno = $comunidadeConn->alterarComunidade($comunidade);

if($retorno == null || $retorno == 0){
    header("location:../view/comunidadeCrud.php?idcomunidade=$idcomunidade&msg=Erro ao alterar comunidade!");
}else{
    header("location:../view/comunidadeCrud.php?msg=Comunidade alterada com sucesso!");
}

?>