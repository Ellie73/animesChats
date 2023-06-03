<?php
session_start();
require_once '../model/DAO/moderadorDAO.php';
require_once '../model/DTO/moderadorDTO.php';
if (isset($_POST["meio"]) == "C") {
    $numero_cartao = $_POST["numerocartao"];
    $nome_cartao = $_POST["nomecartao"];
    $periodo = $_POST["periodo"];
    $vencimento_cartao = $_POST["vencimento"];
    $vencimento_cartao = date('Y-m-d', strtotime($vencimento_cartao . '-01'));
    $cvv = $_POST["cvv"];
    $cpf = $_POST["cpf"];
    $meio_pagamento = $_POST["meio"];
    $data_assinatura = date("Y-m-d");
    $idusuario = $_POST["idusuario"];
    $valor = $_POST["valor"];
    //Instância da classe moderador
    $moderador = new moderadorDTO("", $idusuario, $periodo, $valor, $data_assinatura, $meio_pagamento, $cpf, $numero_cartao, $nome_cartao, $vencimento_cartao, $cvv);
    //Conexão com o banco de dados
    $moderadorConn = new moderadorDAO();
    $retorno = $moderadorConn->assinarCartao($moderador);
    $retorno2 = $moderadorConn->alterarPerfil($moderador);
    $_SESSION["perfil"]="M";
    if ($retorno != null || $retorno != 0) {
        header("location:../view/moderador.php?msg=pagamento realizado com sucesso!");
    } else {
        header("location:../view/pagamento.php?erro!");
    }
} elseif (isset($_POST["meio"]) == "P") {
    $valor = $_POST["valor"];
    $idusuario = $_POST["idusuario"];
    $data_assinatura = date("Y-m-d");
    $periodo = $_POST["periodo"];
    $meio_pagamento = $_POST["meio"];
    //Instância da classe moderador
    $moderador = new moderadorDTO("", $idusuario, $periodo, $valor, $data_assinatura, $meio_pagamento, "", "", "", "", "");
    //Conexão com o banco de dados
    $moderadorConn = new moderadorDAO();
    $retorno = $moderadorConn->assinarPix($moderador);
    $retorno2 = $moderadorConn->alterarPerfil($moderador);
    $_SESSION["perfil"]="M";
    if ($retorno != null || $retorno != 0) {
        header("location:../view/moderador.php?msg=pagamento realizado com sucesso!");
    } else {
        header("location:../view/pagamento.php?erro!");
    }
} else {
}
