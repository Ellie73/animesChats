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
    public function popularesTema()
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");
            $sql = "SELECT t.idtema, t.nome, t.fototema, t.genero, AVG(a.nota) AS media_avaliacao
            FROM tema t
            JOIN avaliacao a ON t.idtema = a.idtema
            WHERE t.tipotema = 'Anime'
            GROUP BY t.idtema, t.nome, t.fototema, t.genero
            ORDER BY media_avaliacao DESC
            LIMIT 3;
            ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetchALL(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function comentadosTema()
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");
            $sql = "SELECT t.idtema, t.nome, t.fototema, t.genero, COUNT(a.comentario) AS total_comentarios
            FROM tema t
            JOIN avaliacao a ON t.idtema = a.idtema
            GROUP BY t.idtema, t.nome, t.fototema, t.genero
            ORDER BY total_comentarios DESC
            LIMIT 4;
            ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetchALL(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function buscarAnime($nome)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");
            $sql = "SELECT * FROM tema WHERE tipotema = 'Anime' AND nome LIKE ?;
            ";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, "%{$nome}%");
            $stmt->execute();
            $retorno = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function buscarManga($nome)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");
            $sql = "SELECT * FROM tema WHERE tipotema = 'Mangá' AND nome LIKE ?;
            ";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, "%{$nome}%");
            $stmt->execute();
            $retorno = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function buscarManhwa($nome)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");
            $sql = "SELECT * FROM tema WHERE tipotema = 'Manhwa' AND nome LIKE ?;
            ";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, "%{$nome}%");
            $stmt->execute();
            $retorno = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function buscarManhua($nome)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");
            $sql = "SELECT * FROM tema WHERE tipotema = 'Manhua' AND nome LIKE ?;
            ";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, "%{$nome}%");
            $stmt->execute();
            $retorno = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function buscarWebtoon($nome)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");
            $sql = "SELECT * FROM tema WHERE tipotema = 'Webtoon' AND nome LIKE ?;
            ";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, "%{$nome}%");
            $stmt->execute();
            $retorno = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function verTema($id)
    {
        try {

            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "SELECT * FROM tema WHERE idtema=?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function alterarTema($tema)
    {
        try {

            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "UPDATE tema SET nome=?, sinopse=?, genero=?, ano_estreia=?, quantidade=?, estado=?, tipotema=?, fototema=? WHERE idtema=?";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(1, $tema->getNomeTema());
            $stmt->bindValue(2, $tema->getSinopse());
            $stmt->bindValue(3, $tema->getGeneroTema());
            $stmt->bindValue(4, $tema->getEstreia());
            $stmt->bindValue(5, $tema->getQuantidade());
            $stmt->bindValue(6, $tema->getEstadoTema());
            $stmt->bindValue(7, $tema->getTipo());
            $stmt->bindValue(8, $tema->getFototema());
            $stmt->bindValue(9, $tema->getIdTema());
            $retorno = $stmt->execute();

            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function deletarTema($idtema)
    {
        try {

            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "DELETE FROM tema WHERE idtema=?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $idtema);
            $retorno = $stmt->execute();

            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
