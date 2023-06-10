<?php

class mensagemDAO
{

    public function enviarMensagem($msg)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "INSERT INTO mensagem(conteudo,remetente,chat,data,hora)   VALUES (?,?,?,?,?)";

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

            $sql = "SELECT mensagem.*, usuario.nome, usuario.foto FROM mensagem JOIN usuario ON mensagem.remetente = usuario.id_usuario WHERE chat = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $chat);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function pesquisarMensagem($searchName)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");
            $sql = "SELECT m.idmensagem, m.conteudo, u.nome AS nome, m.chat, m.data, m.hora, m.remetente
            FROM mensagem m
            INNER JOIN usuario u ON m.remetente = u.id_usuario
            WHERE u.nome LIKE :searchName
            ORDER BY m.data DESC, m.hora DESC";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['searchName' => "%$searchName%"]);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultados;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
