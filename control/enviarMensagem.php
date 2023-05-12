<?php

//ENVIAR MENSAGEM
require_once '../model/DAO/mensagemDAO.php';
require_once '../model/DTO/mensagemDTO.php';

$conteudo= $_POST["conteudo"];
$remetente = $_POST["remetente"];
$data= $_POST["data"];
$hora = $_POST["hora"];
$chat = $_POST["chat"];

//Instância da classe mensagem
$msg = new mensagemDTO("", $remetente, $chat, $data, $hora, $conteudo);

//Conexão com o banco de dados
$msgConn = new mensagemDAO();
$retorno = $msgConn->enviarMensagem($msg);