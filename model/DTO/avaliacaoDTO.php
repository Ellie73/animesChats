<?php

//avaliacaoDTO
class avaliacaoDTO
{
    private $idavaliacao;
    private $idavaliador;	
    private $comentario;
    private $nota;
    private $idtema;

    public function __construct($idavaliacao,$idavaliador,$comentario,$nota,$idtema)
    {
        $this->idavaliacao = $idavaliacao;
        $this->idavaliador = $idavaliador;
        $this->comentario = $comentario;
        $this->nota = $nota;
        $this->idtema = $idtema;
    }

    //SET
    function setIdAvaliacao($idavaliacao)
    {
        $this->idavaliacao = $idavaliacao;
    }
    function setIdAvaliador($idavaliador)
    {
        $this->idavaliador = $idavaliador;
    }
    function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }
    function setNota($nota)
    {
        $this->nota = $nota;
    }
    function setIdTema($idtema)
    {
        $this->idtema = $idtema;
    }

    //GET
    function getIdAvaliacao()
    {
        return $this->idavaliacao;
    }
    function getIdAvaliador()
    {
        return $this->idavaliador;
    }
    function getComentario()
    {
        return $this->comentario;
    }
    function getNota()
    {
        return $this->nota;
    }
    function getIdTema()
    {
        return $this->idtema;
    }
    
}//FIM avaliacaoDTO