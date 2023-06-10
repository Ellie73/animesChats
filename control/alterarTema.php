<?php

//tema usuario 
require_once "../model/DAO/temaDAO.php";
require_once "../model/DTO/temaDTO.php";

// if($_SESSION["perfil"] != "A"){
//     header("location:../view/cadastroUsuario.php?msg=Sem permissão para entrar!");
// }

$nometema = $_POST["nome"];
$sinopse = $_POST["sinopse"];
$generotema = $_POST["genero"];
$estreia = $_POST["estreia"];
$tipo = $_POST["tipo"];
$quantidade = $_POST["quantidade"];
$estadotema = $_POST["estado"];
$idtema=$_POST['idtema'];
$foto = null; // Inicializa a variável $foto

if(isset($_POST["submit"])){
    $foto = $_FILES["foto"];

    // Verifica se foi selecionada uma nova foto
    if ($foto["error"] !== UPLOAD_ERR_NO_FILE) {
        $extensao = explode(".", $foto["name"]);
        
        // Verifica a extensão da foto
        if ($extensao[sizeof($extensao)-1] == "jpg" || $extensao[sizeof($extensao)-1] == "jpeg" || $extensao[sizeof($extensao)-1] == "JPG" || $extensao[sizeof($extensao)-1] == "png"){
            move_uploaded_file($foto["tmp_name"], "../img/temas/" . $foto["name"]);
            $foto = "../img/temas/" . $_FILES["foto"]["name"];
        } else {
            header("location:../view/temaCrud.php?idtema=$idtema&msg=Foto não aceita! Somente são permitidas imagens JPG, JPEG e PNG.");
            exit;
        }
    } else {
        // Se não foi selecionada uma nova foto, mantém a foto anterior
        $foto = $_POST["fotoantiga"];
    }
} else {
    header("location:../view/temaCrud.php?idtema=$idtema&msg=Erro ao enviar foto!");
}


$tema = new temaDTO($nometema, $sinopse, $generotema, $estreia, $tipo, $quantidade, $estadotema, $foto);
$tema->setIdTema($idtema);

$temaConn = new temaDAO();
$retorno = $temaConn->alterarTema($tema);

if($retorno == null || $retorno == 0){
    header("location:../view/temaCrud.php?idtema=$idtema&msg=Erro ao alterar tema!");
}else{
    header("location:../view/temaCrud.php?idtema=$idtema&msg=Tema alterado com sucesso!");
}

?>