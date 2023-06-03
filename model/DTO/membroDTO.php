<?php

//membroDTO
class membroDTO
{

    private $idmembro;
    private $idcomunidade;
    private $idusuario;
    private $tipo;
    private $situacao;

    public function __construct($idmembro, $idcomunidade, $idusuario, $tipo, $situacao)
    {
        $this->idmembro = $idmembro;
        $this->idcomunidade = $idcomunidade;
        $this->idusuario = $idusuario;
        $this->tipo = $tipo;
        $this->situacao = $situacao;
    }
    
    // SET
    function setIdMembro($idmembro)
    {
        $this->idmembro = $idmembro;
    }
    function setIdComunidade($idcomunidade)
    {
        $this->idcomunidade = $idcomunidade;
    }
    function setIdUsuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }
    function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }
    
    // GET
    function getIdMembro()
    {
        return $this->idmembro;
    }
    function getIdComunidade()
    {
        return $this->idcomunidade;
    }
    function getIdUsuario()
    {
        return $this->idusuario;
    }
    function getTipo()
    {
        return $this->tipo;
    }
    function getSituacao()
    {
        return $this->situacao;
    }
    
}//FIM membroDTO