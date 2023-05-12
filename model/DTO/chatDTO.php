<?php

//chatDTO
class chatDTO
{

    private $idchat;
    private $tema;
    private $titulo;

    public function __construct($idchat, $tema, $titulo)
    {
        $this->idchat = $idchat;
        $this->tema = $tema;
        $this->titulo = $titulo;
    }

    //SET
    function setIdChat($idchat)
    {
        $this->idchat = $idchat;
    }
    function setTema($tema)
    {
        $this->tema = $tema;
    }
    function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    //GET
    function getIdChat()
    {
        return $this->idchat;
    }
    function getTema()
    {
        return $this->tema;
    }
    function getTitulo()
    {
        return $this->titulo;
    }
    
}//FIM chatDTO