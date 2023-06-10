<?php
require_once '../model/DAO/avaliacaoDAO.PHP';
require_once '../model/DTO/avaliacaoDTO.PHP';

$idavaliador=$_POST['idusuario'];
$comentario=$_POST['comentario'];
$idtema=$_POST['idtema'];
$nota=$_POST['nota'];

//Instância da classe avaliacao

$avaliacao = new avaliacaoDTO("",$idavaliador,$comentario,$nota,$idtema);

//ferifica se já há uma avaliação

$avaliacaoConn = new avaliacaoDAO();
$retorno = $avaliacaoConn -> consultarAvaliacao($idtema,$idavaliador);
if ($retorno == null || $retorno == 0){
    $avaliar = $avaliacaoConn -> criarAvaliacao($avaliacao);
    if ($avaliar != null || $avaliar != 0){
        header("location:../../view/tema.php?id=$idtema&msg=Avaliação lançada com sucesso!");
    } else {
        header("location:../../view/tema.php?id=$idtema&msg=Erro ao avaliar!");
    }
}else{
    $dele = $avaliacaoConn -> deletarAvaliacao($idtema,$idavaliador);
    $avaliar = $avaliacaoConn -> criarAvaliacao($avaliacao);
    if ($avaliar != null || $avaliar != 0){
        header("location:../../view/tema.php?id=$idtema&msg=Avaliação lançada com sucesso!");
    } else {
        header("location:../../view/tema.php?id=$idtema&msg=Erro ao avaliar!");
    }
}
?>