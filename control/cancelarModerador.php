<?php
require_once '../model/DAO/moderadorDAO.php';
require_once '../model/DTO/moderadorDTO.php';

$idusuario=$_GET['idusuario'];

//Conexão com o banco de dados
$moderadorConn = new moderadorDAO();
$retorno = $moderadorConn->tirarModeracao($idusuario);
$retorno2 = $moderadorConn->deletarModeracao($idusuario);
if ($retorno == null || $retorno == 0 || $retorno2 == null || $retorno2 == 0) {
    header("location:../view/assinantes.php?msg=Erro!");
} else {
    header("location:../view/assinantes.php?msg=Usuário alterado!");
}

?>