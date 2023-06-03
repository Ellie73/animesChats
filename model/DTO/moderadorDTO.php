<?php

//moderadorDTO
class moderadorDTO{
    
    private $idmoderador;
    private $idusuario;
    private $periodo;
    private $valor;
    private $data_assinatura;
    private $meio_pagamento;
    private $cpf;
    private $numero_cartao;
    private $nome_cartao;
    private $vencimento_cartao;
    private $cvv;

    public function __construct($idmoderador,$idusuario,$periodo,$valor,$data_assinatura,$meio_pagamento,$cpf,$numero_cartao,$nome_cartao,$vencimento_cartao,$cvv){
        $this->idusuario = $idusuario;
        $this->idmoderador = $idmoderador;
        $this->periodo = $periodo;
        $this->valor = $valor;
        $this->data_assinatura = $data_assinatura;
        $this->meio_pagamento = $meio_pagamento;
        $this->cpf = $cpf;
        $this->numero_cartao = $numero_cartao;
        $this->vencimento_cartao = $vencimento_cartao;
        $this->nome_cartao = $nome_cartao;
        $this->cvv = $cvv;
    }

    //SET
    function setIdusuario($idusuario){
        $this->idusuario=$idusuario;
    }
    function setIdmoderador($idmoderador){
        $this->idmoderador=$idmoderador;
    }
    function setPeriodo($periodo){
        $this->periodo=$periodo;
    }
    function setValor($valor){
        $this->valor=$valor;
    }
    function setData_assinatura($data_assinatura){
        $this->data_assinatura=$data_assinatura;
    }
    function setMeio_pagamento($meio_pagamento){
        $this->meio_pagamento=$meio_pagamento;
    }
    function setCpf($cpf){
        $this->cpf=$cpf;
    }
    function setNumero_cartao($numero_cartao){
        $this->numero_cartao = $numero_cartao;
    }
    function setVencimento_cartao($vencimento_cartao){
        $this->vencimento_cartao = $vencimento_cartao;
    }
    function setCvv($cvv){
        $this->cvv=$cvv;
    }
    function setNome_cartao($nome_cartao){
        $this->nome_cartao = $nome_cartao;
    }

    //GET
    function getIdusuario(){
        return $this->idusuario;
    }
    function getIdmoderador(){
        return $this->idmoderador;
    }
    function getPeriodo(){
        return $this->periodo;
    }
    function getValor(){
        return $this->valor;
    }
    function getData_assinatura(){
        return $this->data_assinatura;
    }
    function getMeio_pagamento(){
        return $this->meio_pagamento;
    }
    function getCpf(){
        return $this->cpf;
    }
    function getNumero_cartao(){
        return $this->numero_cartao;
    }
    function getVencimento_cartao(){
        return $this->vencimento_cartao;
    }
    function getCvv(){
        return $this->cvv;
    }
    function getNome_cartao(){
        return $this->nome_cartao;
    }
}//FIM moderadorDTO