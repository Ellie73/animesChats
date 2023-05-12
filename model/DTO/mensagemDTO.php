<?php

//mensagemDTO
class mensagemDTO
{

    private $idmensagem;
    private $remetente;
    private $chat;
    private $data;
    private $hora;
    private $conteudo;

    public function __construct($idmensagem, $remetente, $chat, $data, $hora, $conteudo)
    {
        $this->idmensagem = $idmensagem;
        $this->remetente = $remetente;
        $this->chat = $chat;
        $this->data = $data;
        $this->hora = $hora;
        $this->conteudo = $conteudo;
    }

    //SET
    function setIdMensagem($idmensagem)
    {
        $this->idmensagem = $idmensagem;
    }
    function setRemetente($remetente)
    {
        $this->remetente = $remetente;
    }
    function setChat($chat)
    {
        $this->chat = $chat;
    }
    function setData($data)
    {
        $this->data = $data;
    }
    function setHora($hora)
    {
        $this->hora = $hora;
    }
    function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;
    }

    //GET
    function getIdMensagem()
    {
        return $this->idmensagem;
    }
    function getRemetente()
    {
        return $this->remetente;
    }
    function getChat()
    {
        return $this->chat;
    }
    function getData()
    {
        return $this->data;
    }
    function getHora()
    {
        return $this->hora;
    }
    function getConteudo()
    {
        return $this->conteudo;
    }
    
}//FIM mensagemDTO