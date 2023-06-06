<?php

class comunidadeDAO
{

    public function criarComunidade($comunidade)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "INSERT INTO comunidade(nome,idtema,situacao,descricao,foto,idcriador) values(?,?,?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $comunidade->getNome());
            $stmt->bindValue(2, $comunidade->getIdTema());
            $stmt->bindValue(3, $comunidade->getSituacao());
            $stmt->bindValue(4, $comunidade->getDescricao());
            $stmt->bindValue(5, $comunidade->getFoto());
            $stmt->bindValue(6, $comunidade->getCriador());
            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function contarComunidade()
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");
            $sql = "SELECT COUNT(*) AS total FROM comunidade";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function pesquisarComunidade($page)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $resultadosPorPagina = 6;
            $offset = ($page - 1) * $resultadosPorPagina;

            $sql = "SELECT * FROM comunidade ORDER BY nome LIMIT $resultadosPorPagina OFFSET $offset";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function listarComunidades(){
        try{
    
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8',"root","");
    
            $sql = "SELECT * FROM comunidade";
    
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $retorno;
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function listarComunidadesTema($idtema){
        try{
    
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8',"root","");
    
            $sql = "SELECT * FROM comunidade WHERE idtema=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$idtema);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $retorno;
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function comunidade($id){
        try{
    
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8',"root","");
    
            $sql = "SELECT comunidade.*, usuario.nome AS nome_usuario
            FROM comunidade
            JOIN usuario ON comunidade.idcriador = usuario.id_usuario
            WHERE idcomunidade = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$id);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $retorno;
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function verComunidade($id){
        try{
    
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8',"root","");
    
            $sql = "SELECT comunidade.*, tema.nome AS nome_tema
            FROM comunidade
            JOIN tema ON comunidade.idtema = tema.idtema
            WHERE idcomunidade = ?";
    
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$id);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $retorno;
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function alterarComunidade($comunidade){
        try{
    
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8',"root","");
    
            $sql = "UPDATE comunidade SET nome=?, situacao=?, descricao=?, idtema=? WHERE idcomunidade=?";
    
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$comunidade->getNome());
            $stmt->bindValue(2,$comunidade->getSituacao());
            $stmt->bindValue(3,$comunidade->getDescricao());
            $stmt->bindValue(4,$comunidade->getIdTema());
            $stmt->bindValue(5,$comunidade->getIdComunidade());
            $retorno = $stmt->execute();
    
            return $retorno;
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function deletarComunidade($idcomunidade){
        try{
    
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats',"root","");
    
            $sql = "DELETE FROM comunidade WHERE idcomunidade=?";
    
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,$idcomunidade);
            $retorno = $stmt->execute();
    
            return $retorno;
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
