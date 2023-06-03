<?php

//alterarSenhaControl.php
require_once "../model/DAO/usuarioDAO.php";
require_once "../model/DTO/usuarioDTO.php";

session_start();
$idusuario=$_POST['idusuario'];
$senha = md5($_POST["senha"]);

$usuario = new usuarioDTO("","",$senha,"","","","","","","","");
$usuario->setSenha($senha);
$usuario->setIdusuario($_SESSION["idusuario"]);

$usuarioConn = new usuarioDAO();
$retorno = $usuarioConn->alterarSenha($usuario);
header("location:../view/perfil.php?msg=senha alterada!");
