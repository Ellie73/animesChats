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
    public function exibirChat($tema)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "SELECT * FROM chat WHERE tema=?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $tema);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $retorno;
        
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}