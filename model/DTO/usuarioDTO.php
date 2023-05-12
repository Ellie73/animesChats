<?php

//usuarioDTO
class usuarioDTO{
    
    private $idusuario;
    private $nome;
    private $email;
    private $telefone;
    private $estado;
    private $cidade;
    private $senha;
    private $foto;
    private $genero;
    private $nascimento;
    private $perfil;
    private $situacaoUsuario;

    public function __construct($nome,$email,$senha,$telefone,$estado,$cidade,$foto,$genero,$nascimento,$perfil,$situacaoUsuario){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->telefone = $telefone;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->foto = $foto;
        $this->genero = $genero;
        $this->nascimento = $nascimento;
        $this->perfil = $perfil;
        $this->situacaoUsuario = $situacaoUsuario;
    }

    //SET
    function setIdusuario($idusuario){
        $this->idusuario=$idusuario;
    }
    function setNome($nome){
        $this->nome=$nome;
    }
    function setEmail($email){
        $this->email=$email;
    }
    function setTelefone($telefone){
        $this->telefone=$telefone;
    }
    function setEstado($estado){
        $this->estado=$estado;
    }
    function setCidade($cidade){
        $this->cidade=$cidade;
    }
    function setSenha($senha){
        $this->senha=$senha;
    }
    function setFoto($foto){
        $this->foto=$foto;
    }
    function setGenero($genero){
        $this->genero=$genero;
    }
    function setNascimento($nascimento){
        $this->nascimento=$nascimento;
    }
    function setPerfil($perfil){
        $this->perfil=$perfil;
    }
    function setSituacaoUsuario($situacaoUsuario){
        $this->situacaoUsuario=$situacaoUsuario;
    }


    //GET
    function getIdusuario(){
        return $this->idusuario;
    }
    function getNome(){
        return $this->nome;
    }
    function getEmail(){
        return $this->email;
    }
    function getTelefone(){
        return $this->telefone;
    }
    function getEstado(){
        return $this->estado;
    }
    function getCidade(){
        return $this->cidade;
    }
    function getSenha(){
        return $this->senha;
    }
    function getFoto(){
        return $this->foto;
    }
    function getGenero(){
        return $this->genero;
    }
    function getNascimento(){
        return $this->nascimento;
    }
    function getPerfil(){
        return $this->perfil;
    }
    function getSituacaoUsuario(){
        return $this->situacaoUsuario;
    }
}//FIM usuarioDTO