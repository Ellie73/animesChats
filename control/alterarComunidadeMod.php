<?php

//alterar comunidade
require_once "../model/DAO/comunidadeDAO.php";
require_once "../model/DTO/comunidadeDTO.php";

$idcomunidade = $_POST["idcomunidade"];
$nome = $_POST["nome"];
$idtema = $_POST["tema"];
$descricao = $_POST["descricao"];
$foto = null; // Inicializa a variável $foto

if(isset($_POST["submit"])){
    $foto = $_FILES["foto"];

    // Verifica se foi selecionada uma nova foto
    if ($foto["error"] !== UPLOAD_ERR_NO_FILE) {
        $extensao = pathinfo($foto["name"], PATHINFO_EXTENSION);
        
        // Verifica a extensão da foto
        if (in_array($extensao, ["jpg", "jpeg", "png"])){
            $diretorioDestino = "../img/comunidades/";
            $nomeArquivo = uniqid() . "." . $extensao;
            $caminhoCompleto = $diretorioDestino . $nomeArquivo;

            if (move_uploaded_file($foto["tmp_name"], $caminhoCompleto)) {
                $foto = $caminhoCompleto;
            } else {
                header("location:../view/moderador.php?idcomunidade=$idcomunidade&msg=Erro ao mover o arquivo de imagem.");
                exit;
            }
        } else {
            header("location:../view/moderador.php?idcomunidade=$idcomunidade&msg=Foto não aceita! Somente são permitidas imagens JPG, JPEG e PNG.");
            exit;
        }
    } else {
        // Se não foi selecionada uma nova foto, mantém a foto anterior
        $foto = $_POST["fotoantiga"];
    }
} else {
    header("location:../view/moderador.php?idcomunidade=$idcomunidade&msg=Erro ao enviar foto!");
    exit;
}


$comunidade = new comunidadeDTO($nome, $descricao, $idtema, "", $foto, "");
$comunidade->setIdcomunidade($idcomunidade);

$comunidadeConn = new comunidadeDAO();
$retorno = $comunidadeConn->alterarComunidadeMod($comunidade);

if($retorno == null || $retorno == 0){
    header("location:../view/moderador.php?idcomunidade=$idcomunidade&msg=Erro ao alterar comunidade!");
}else{
    header("location:../view/moderador.php?idcomunidade=$idcomunidade&msg=Comunidade alterada com sucesso!");
}

?>
