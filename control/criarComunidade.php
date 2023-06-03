<?php
session_start();
// Comunidade
require_once '../model/DAO/comunidadeDAO.php';
require_once '../model/DTO/comunidadeDTO.php';

$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$idtema = $_POST["tema"];
$situacao = '1';
$criador= $_SESSION["idusuario"];
$foto = null; // Inicializa a variável $foto

// Verifica se o formulário foi enviado
if (isset($_POST["submit"])) {
    $foto = $_FILES["foto"];
    $extensao = explode(".", $foto["name"]);

    // Verifica extensão
    if ($extensao[sizeof($extensao) - 1] == "jpg" || $extensao[sizeof($extensao) - 1] == "jpeg" || $extensao[sizeof($extensao) - 1] == "JPG" || $extensao[sizeof($extensao) - 1] == "png") {
        move_uploaded_file($foto["tmp_name"], "../img/comunidades/" . $foto["name"]);
        $foto = "../img/comunidades/" . $_FILES["foto"]["name"];
    } else {
        header("location:../view/criarComunidade.php?msg=Foto não aceita! Somente são permitidas imagens JPG, JPEG e PNG.");
        exit;
    }
} else {
    header("location:../view/criarComunidade.php?msg=Foto não enviada!");
    exit;
}

// Verifica se o usuário colocou ou não uma foto
if ($foto == null || empty($foto)) {
    header("location:../view/criarComunidade.php?msg=Escolha uma foto");
    exit;
}

// Cria objeto comunidadeDTO
$comunidade = new comunidadeDTO($nome, $descricao, $idtema, $situacao, $foto, $criador);

// Conexão com o banco de dados
$comunidadeConn = new comunidadeDAO();
$retorno = $comunidadeConn->criarComunidade($comunidade);

if ($retorno != null || $retorno != 0) {
    header("location:../view/home.php?msg=Comunidade criada com sucesso!");
} else {
    header("location:../view/criarComunidade.php?msg=Ocorreu um erro ao criar a comunidade");
}
?>
