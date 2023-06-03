<?php

class temaDAO
{

    public function cadastrarTema($tema)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "INSERT INTO tema(nome,sinopse,genero,ano_estreia,quantidade,estado,tipotema,fototema)   VALUES (?,?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $tema->getNomeTema());
            $stmt->bindValue(2, $tema->getSinopse());
            $stmt->bindValue(3, $tema->getGeneroTema());
            $stmt->bindValue(4, $tema->getEstreia());
            $stmt->bindValue(5, $tema->getQuantidade());
            $stmt->bindValue(6, $tema->getEstadoTema());
            $stmt->bindValue(7, $tema->getTipo());
            $stmt->bindValue(8, $tema->getFotoTema());
            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function exibirTema($tema)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "SELECT * FROM tema WHERE idtema=?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $tema);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

            return $retorno;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function pesquisarTema($tipo, $page)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $resultadosPorPagina = 6;
            $offset = ($page - 1) * $resultadosPorPagina;

            $sql = "SELECT * FROM tema WHERE tipotema = ? ORDER BY nome LIMIT $resultadosPorPagina OFFSET $offset";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $tipo);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function contarTema($tipo)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");
            $sql = "SELECT COUNT(*) AS total FROM tema WHERE tipotema = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $tipo);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

            return $retorno;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function listarTema()
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");
            $sql = "SELECT * FROM tema";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetchALL(PDO::FETCH_ASSOC);

            return $retorno;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
