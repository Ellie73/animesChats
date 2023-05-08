<?php

//cadastro
require_once '../model/DAO/usuarioDAO.php';
require_once '../model/DTO/usuarioDTO.php';

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$senha = $_POST["senha"];
$senha = md5($senha);
$genero = $_POST["genero"];
$nascimento = $_POST["nascimento"];
$foto = '../img/usuarios/user.png';
$perfil = 'U';
$situacaoUsuario = 1;
//Instância da classe usuario
$usuario = new usuarioDTO($nome,$email,$senha,$telefone,$estado,$cidade,$foto,$genero,$nascimento,$perfil,$situacaoUsuario);
//Conexão com o banco de dados
$usuarioConn = new usuarioDAO();
$retorno = $usuarioConn->cadastrarUsuario($usuario);
if ($retorno != null || $retorno != 0){
    header("location:../view/login.php?msg=Usuario cadastrado com sucesso!");
} else {
    header("location:../view/cadastroUsuario.php?msg=Usuario cadastrado com sucesso!");
}