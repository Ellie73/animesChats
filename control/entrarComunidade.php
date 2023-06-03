<?php
// Membro
require_once '../model/DAO/membroDAO.php';
require_once '../model/DTO/membroDTO.php';



$membroConn = new membroDTO();
$membro = $membro -> membroDAO();