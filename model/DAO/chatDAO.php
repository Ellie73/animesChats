<?php

class chatDAO
{

    public function criarChat($chat)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "INSERT INTO chat(tema_comunidade,titulo)   VALUES (?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $chat->getTema());
            $stmt->bindValue(2, $chat->getTitulo());
            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function exibirChat($local)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "SELECT * FROM chat WHERE tema_comunidade=?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $local);
            $stmt->execute();
            $retorno = $stmt->fetchALL(PDO::FETCH_ASSOC);
            
            return $retorno;
        
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}