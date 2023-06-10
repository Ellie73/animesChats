<?php

class avaliacaoDAO
{

    public function criarAvaliacao($avaliacao)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "INSERT INTO avaliacao(idavaliador,comentario,nota,idtema)   VALUES (?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $avaliacao->getIdAvaliador());
            $stmt->bindValue(2, $avaliacao->getComentario());
            $stmt->bindValue(3, $avaliacao->getNota());
            $stmt->bindValue(4, $avaliacao->getIdTema());
            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function exibirAvaliacoes($tema)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "SELECT avaliacao.*, usuario.nome, usuario.foto FROM avaliacao 
            INNER JOIN usuario ON avaliacao.idavaliador = usuario.id_usuario 
            WHERE avaliacao.idtema = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $tema);
            $stmt->execute();
            $retorno = $stmt->fetchALL(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function consultarAvaliacao($tema, $idusuario)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "SELECT * FROM avaliacao WHERE idtema=? AND idavaliador=?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $tema);
            $stmt->bindValue(2, $idusuario);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function deletarAvaliacao($tema, $idusuario)
    {
        try {

            $conn = new PDO('mysql:host=localhost;dbname=anime-chats', "root", "");

            $sql = "DELETE FROM avaliacao WHERE idtema=? AND idavaliador=?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $tema);
            $stmt->bindValue(2, $idusuario);
            $retorno = $stmt->execute();

            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function calcularAvaliacao($tema)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats', "root", "");

            $sql = "SELECT AVG(nota) AS media FROM avaliacao WHERE idtema = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $tema);
            $stmt->execute(); // Executar a consulta

            $retorno = $stmt->fetch(PDO::FETCH_ASSOC); // Recuperar os resultados

            return $retorno['media']; // Retornar a média das notas

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function totalNotas($tema)
{
    try {
        $conn = new PDO('mysql:host=localhost;dbname=anime-chats', "root", "");

        $sql = "SELECT COUNT(*) AS total FROM avaliacao WHERE idtema = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, $tema);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['total'];

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

}
