<?php

class mensagemDAO
{

    public function enviarMensagem($msg)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "INSERT INTO mensagem(conteudo,remetente,chat,'data',hora,hora)   VALUES (?,?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $msg->getConteudo());
            $stmt->bindValue(2, $msg->getRemetente());
            $stmt->bindValue(3, $msg->getChat());
            $stmt->bindValue(4, $msg->getData());
            $stmt->bindValue(5, $msg->getHora());
            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function exibirMensagem($chat)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "SELECT * FROM mensagem WHERE chat = ? ORDER BY id DESC LIMIT 10";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $chat);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $retorno;
        
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}