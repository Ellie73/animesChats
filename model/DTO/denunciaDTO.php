<?php

//denunciaDTO
class denunciaDTO
{

    private $iddenuncia;
    private $iddenunciante;
    private $ocorrencia;
    private $contato;

    public function __construct($iddenuncia, $iddenunciante, $ocorrencia, $contato)
    {
        $this->iddenuncia = $iddenuncia;
        $this->iddenunciante = $iddenunciante;
        $this->ocorrencia = $ocorrencia;
        $this->contato = $contato;
    }

    //SET
    function setIdDenuncia($iddenuncia)
    {
        $this->iddenuncia = $iddenuncia;
    }
    function setIdDenunciante($iddenunciante)
    {
        $this->iddenunciante = $iddenunciante;
    }
    function setOcorrencia($ocorrencia)
    {
        $this->ocorrencia = $ocorrencia;
    }
    function setContato($contato)
    {
        $this->contato = $contato;
    }

    //GET
    function getIdDenuncia()
    {
        return $this->iddenuncia;
    }
    function getIdDenunciante()
    {
        return $this->iddenunciante;
    }
    function getOcorrencia()
    {
        return $this->ocorrencia;
    }
    function getContato()
    {
        return $this->contato;
    }
    
}//FIM denunciaDTO