<?php

//criar chat
require_once '../model/DAO/chatDAO.php';
require_once '../model/DTO/chatDTO.php';

$tema= $_POST["tema"];
$titulo = $_POST["titulo"];

//Instância da classe chat
$chat = new chatDTO("",$tema,$titulo);

//Conexão com o banco de dados
$chatConn = new chatDAO();
$retorno = $chatConn->criarChat($chat);