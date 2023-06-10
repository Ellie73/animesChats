<?php
require_once '../model/DAO/denunciaDAO.php';

if (isset($_GET['iddenuncia'])) {

$iddenuncia=$_GET['iddenuncia'];
$denunciaConn = new denunciaDAO();
$denuncia = $denunciaConn -> deletardenuncia($iddenuncia);
header('Location: ../view/verDenuncias.php');

}else{

    header('Location: ../view/verDenuncias.php');

}

?>