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

//Foto
if (isset($_POST["submit"])) {
    $foto = $_FILES["foto"];
    $extensao = explode(".", $foto["name"]);

    //Verifica extensão
    if ($extensao[sizeof($extensao) - 1] == "jpg" || $extensao[sizeof($extensao) - 1] == "jpeg" || $extensao[sizeof($extensao) - 1] == "JPG" || $extensao[sizeof($extensao) - 1] == "png") {
        move_uploaded_file($foto["tmp_name"], "../img/temas/" . $foto["name"]);
        $fototema = "../img/temas/" . $_FILES["foto"]["name"];
    } else {
        echo "Arquivo não aceito!";
    }
} else {
    header("location:../view/cadastroTema.php?msg=Foto não enviada!");
}
//Verifica se o usuario colocou ou nao uma foto
if ($fototema == null || empty($fototema)) {
    echo "Escolha uma foto";
}
//Classe tema
$tema = new temaDTO($nometema, $sinopse, $generotema, $estreia, $tipo, $quantidade, $estadotema, $fototema);

//Conexão com o banco de dados
$temaConn = new temaDAO();
$retorno = $temaConn->cadastrarTema($tema);
if ($retorno != null || $retorno != 0){
    header("location:../view/login.php?msg=Tema cadastrado com sucesso!");
} else {
    header("location:../view/cadastroTema.php?msg=foto não aceita somente jpg jpeg png!!");
}