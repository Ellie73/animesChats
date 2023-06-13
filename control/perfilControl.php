<?php

session_start();
//PerfilControl.php
require_once "../model/DAO/usuarioDAO.php";
require_once "../model/DTO/usuarioDTO.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$genero = $_POST["genero"];
$nascimento = $_POST["nascimento"];
$foto = null; // Inicializa a variável $foto

//Verifica se o usuario colocou ou nao uma foto
if (empty($_FILES["foto"]["name"])) {
    $foto = $_SESSION["foto"];
} 

if(isset($_POST["upload"])){
    $foto = $_FILES["foto"];

    // Verifica se foi selecionada uma nova foto
    if ($foto["error"] !== UPLOAD_ERR_NO_FILE) {
        $extensao = explode(".", $foto["name"]);
        
        // Verifica a extensão da foto
        if ($extensao[sizeof($extensao)-1] == "jpg" || $extensao[sizeof($extensao)-1] == "jpeg" || $extensao[sizeof($extensao)-1] == "JPG" || $extensao[sizeof($extensao)-1] == "png"){
            move_uploaded_file($foto["tmp_name"], "../img/usuarios/" . $foto["name"]);
            $foto = "../img/usuarios/" . $_FILES["foto"]["name"];
        } else {
            header("location:../view/perfil.php?msg=Foto não aceita! Somente são permitidas imagens JPG, JPEG e PNG.");
            exit;
        }
    } else {
        // Se não foi selecionada uma nova foto, mantém a foto anterior
        $foto = $_POST["fotoantiga"];
    }
} else {
    header("location:../view/perfil.php?msg=Erro ao enviar foto!");
}


//instancia da classe usuario
$usuario = new usuarioDTO($nome,$email,"",$telefone,$estado,$cidade,$foto,$genero,$nascimento,"","");
$usuario->setNome($nome);
$usuario->setTelefone($telefone);
$usuario->setEstado($estado);
$usuario->setCidade($cidade);
$usuario->setEmail($email);
$usuario->setFoto($foto);
$usuario->setGenero($genero);
$usuario->setNascimento($nascimento);
$usuario->setIdusuario($_SESSION["idusuario"]);
//conexao com o BD
$usuarioConn = new usuarioDAO();
$retorno = $usuarioConn->editarUsuario($usuario);
//verifica se retornou algo [...]
if($retorno == null || $retorno == 0){
    header("location:../view/perfil.php?msg=Retorno vazio!");
}else{
    session_start();
    $_SESSION["nome"]=$nome;
    $_SESSION["email"]=$email;
    $_SESSION["foto"]=$foto;
    $_SESSION["nascimento"]=$nascimento;
    $_SESSION["genero"]=$genero;
    $_SESSION["estado"]=$estado;
    $_SESSION["cidade"]=$cidade;

    header("location:../view/perfil.php?msg=Perfil editado com sucesso!");
}
?>