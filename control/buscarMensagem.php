<?php
session_start();
if(isset($_GET['id'])) {
    $idchat=$_GET['id'];}
    var_dump($idchat);

require_once '../model/DTO/mensagemDTO.php';
require_once '../model/DAO/mensagemDAO.php';
$chatConn = new mensagemDAO();
$retorno = $chatConn->exibirMensagem($idchat);
foreach ($retorno as $chat) {
    echo "<p>".$retorno['conteudo'] ."</p>";
}
print_r($retorno);