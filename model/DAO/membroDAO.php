<?php

class membroDAO
{

    public function criarMembro($membro)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "INSERT INTO membro(idusuario, idcomunidade, tipo, situacao_membro)   VALUES (?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $membro->getIdUsuario());
            $stmt->bindValue(2, $membro->getIdComunidade());
            $stmt->bindValue(3, $membro->getTipo());
            $stmt->bindValue(4, $membro->getSituacao());
            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}