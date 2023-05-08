<?php

//temaDTO
class temaDTO
{

    private $idtema;
    private $nometema;
    private $sinopse;
    private $generotema;
    private $estreia;
    private $tipo;
    private $quantidade;
    private $estadotema;
    private $fototema;

    public function __construct($nometema, $sinopse, $generotema, $estreia, $tipo, $quantidade, $estadotema, $fototema)
    {
        $this->nometema = $nometema;
        $this->sinopse = $sinopse;
        $this->generotema = $generotema;
        $this->estreia = $estreia;
        $this->tipo = $tipo;
        $this->quantidade = $quantidade;
        $this->estadotema = $estadotema;
        $this->fototema = $fototema;
    }

    //SET
    function setIdTema($idtema)
    {
        $this->idtema = $idtema;
    }
    function setNomeTema($nometema)
    {
        $this->nometema = $nometema;
    }
    function setSinopse($sinopse)
    {
        $this->sinopse = $sinopse;
    }
    function setGeneroTema($generotema)
    {
        $this->generotema = $generotema;
    }
    function setEstreia($estreia)
    {
        $this->estreia = $estreia;
    }
    function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }
    function setEstadoTema($estadotema)
    {
        $this->estadotema = $estadotema;
    }
    function setFotoTema($fototema)
    {
        $this->fototema = $fototema;
    }

    //GET
    function getIdTema()
    {
        return $this->idtema;
    }
    function getNomeTema()
    {
        return $this->nometema;
    }
    function getSinopse()
    {
        return $this->sinopse;
    }
    function getGeneroTema()
    {
        return $this->generotema;
    }
    function getEstreia()
    {
        return $this->estreia;
    }
    function getTipo()
    {
        return $this->tipo;
    }
    function getQuantidade()
    {
        return $this->quantidade;
    }
    function getEstadoTema()
    {
        return $this->estadotema;
    }
    function getFototema()
    {
        return $this->fototema;
    }
}//FIM temaDTO