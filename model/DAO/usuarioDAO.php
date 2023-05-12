<?php

class usuarioDAO{

public function cadastrarUsuario($usuario){
    try{
        $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8',"root","");

        $sql = "INSERT INTO usuario(nome,email,senha,telefone,estado,cidade,foto,genero,nascimento,perfil,situacaoUsuario) values(?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$usuario->getNome());
        $stmt->bindValue(2,$usuario->getEmail());
        $stmt->bindValue(3,$usuario->getSenha());
        $stmt->bindValue(4,$usuario->getTelefone());
        $stmt->bindValue(5,$usuario->getEstado());
        $stmt->bindValue(6,$usuario->getCidade());
        $stmt->bindValue(7,$usuario->getFoto());
        $stmt->bindValue(8,$usuario->getGenero());
        $stmt->bindValue(9,$usuario->getNascimento());
        $stmt->bindValue(10,$usuario->getPerfil());
        $stmt->bindValue(11,$usuario->getsituacaoUsuario());
        $retorno = $stmt->execute();
        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
public function logar($usuario){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8',"root","");

        $sql = "SELECT * FROM usuario WHERE email=? and senha=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$usuario->getEmail());
        $stmt->bindValue(2,$usuario->getSenha());
        $stmt->execute();
        $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

public function listarUsuarios(){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8',"root","");

        $sql = "SELECT * FROM usuario";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
public function pesquisarUsuario($id){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8',"root","");

        $sql = "SELECT * FROM usuario WHERE id_usuario=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
        $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
public function alterarUsuario($usuario){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8',"root","");

        $sql = "UPDATE usuario SET nome=?,email=?,situacaoUsuario=?,perfil=? WHERE id_usuario=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$usuario->getNome());
        $stmt->bindValue(2,$usuario->getEmail());
        $stmt->bindValue(3,$usuario->getSituacaoUsuario());
        $stmt->bindValue(4,$usuario->getPerfil());
        $stmt->bindValue(5,$usuario->getIdusuario());
        $retorno = $stmt->execute();

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
public function deletarUsuario($idusuario){
    try{

        $conn = new PDO('mysql:host=localhost;dbname=anime-chats',"root","");

        $sql = "DELETE FROM usuario WHERE id_usuario=?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,$idusuario);
        $retorno = $stmt->execute();

        return $retorno;

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
}