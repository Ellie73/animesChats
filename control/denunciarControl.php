<?php
//denunciar
require_once '../model/DAO/denunciaDAO.php';
require_once '../model/DTO/denunciaDTO.php';

$iddenunciante=$_POST['iddenunciante'];
$ocorrencia=$_POST['ocorrencia'];
$contato=$_POST['contato'];

//Instância da classe denuncia
$denuncia = new denunciaDTO('',$iddenunciante,$ocorrencia,$contato);

//Conexão com o banco de dados
$denunciaConn = new denunciaDAO();
$retorno = $denunciaConn->denunciar($denuncia);
if ($retorno == null || $retorno == 0){
    header("location:../view/home.php?msg=Chat não criado!!");
}else{
    header("location:../view/home.php?msg=Denuncia realizada");
}
?>