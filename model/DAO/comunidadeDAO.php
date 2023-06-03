<?php

class comunidadeDAO
{

    public function criarComunidade($comunidade)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "INSERT INTO comunidade(nome,idtema,sistuacao,descricao,foto,idcriador) values(?,?,?,?,?,?)";

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

            $sql = "SELECT * FROM comunidade ORDER BY nome DESC LIMIT $resultadosPorPagina OFFSET $offset";

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
