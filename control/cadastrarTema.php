<?php

//cadastro
require_once '../model/DAO/temaDAO.php';
require_once '../model/DTO/temaDTO.php';

$nometema = $_POST["nometema"];
$sinopse = $_POST["sinopse"];
$generotema = $_POST["generotema"];
$estreia = $_POST["estreia"];
$tipo = $_POST["tipo"];
$quantidade = $_POST["quantidade"];
$estadotema = $_POST["estadotema"];
$foto = null; // Inicializa a variável $foto

// Verifica se o formulário foi enviado
if (isset($_POST["submit"])) {
    $foto = $_FILES["foto"];
    $extensao = explode(".", $foto["name"]);

    // Verifica extensão
    if ($extensao[sizeof($extensao) - 1] == "jpg" || $extensao[sizeof($extensao) - 1] == "jpeg" || $extensao[sizeof($extensao) - 1] == "JPG" || $extensao[sizeof($extensao) - 1] == "png") {
        move_uploaded_file($foto["tmp_name"], "../img/temas/" . $foto["name"]);
        $foto = "../img/temas/" . $_FILES["foto"]["name"];
    } else {
        header("location:../view/cadastroTema.php?msg=Foto não aceita! Somente são permitidas imagens JPG, JPEG e PNG.");
        exit;
    }
} else {
    header("location:../view/cadastroTema.php?msg=Foto não enviada!");
    exit;
}

// Verifica se o usuário colocou ou não uma foto
if ($foto == null || empty($foto)) {
    header("location:../view/cadastroTema.php?msg=Escolha uma foto");
    exit;
}
//Classe tema
$tema = new temaDTO($nometema, $sinopse, $generotema, $estreia, $tipo, $quantidade, $estadotema, $foto);

//Conexão com o banco de dados
$temaConn = new temaDAO();
$retorno = $temaConn->cadastrarTema($tema);
if ($retorno != null || $retorno != 0){
    header("location:../view/ferramentas.php?msg=Tema cadastrado com sucesso!");
} else {
    header("location:../view/cadastrotema.php?msg=Ocorreu um erro!");
}