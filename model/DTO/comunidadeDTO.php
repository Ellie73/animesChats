<?php

//comunidadeDTO
class comunidadeDTO{
    
    private $idcomunidade;
    private $nome;
    private $idtema;
    private $situacao;
    private $criador;
    private $descricao;
    private $foto;

    public function __construct($nome, $descricao, $idtema, $situacao, $foto, $criador){
        $this->nome = $nome;
        $this->criador = $criador;
        $this->idtema = $idtema;
        $this->foto = $foto;
        $this->situacao = $situacao;
        $this->descricao = $descricao;
    }

    // SET
    function setIdComunidade($idcomunidade)
    {
        $this->idcomunidade = $idcomunidade;
    }
    function setNome($nome)
    {
        $this->nome = $nome;
    }
    function setCriador($criador)
    {
        $this->criador = $criador;
    }
    function setIdTema($idtema)
    {
        $this->idtema = $idtema;
    }
    function setFoto($foto)
    {
        $this->foto = $foto;
    }
    function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }
    function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    // GET
    function getIdComunidade()
    {
        return $this->idcomunidade;
    }
    function getNome()
    {
        return $this->nome;
    }
    function getCriador()
    {
        return $this->criador;
    }
    function getIdTema()
    {
        return $this->idtema;
    }
    function getFoto()
    {
        return $this->foto;
    }
    function getSituacao()
    {
        return $this->situacao;
    }
    function getDescricao()
    {
        return $this->descricao;
    }

}
//FIM comunidadeDTO