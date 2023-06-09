<?php
class moderadorDAO
{

    public function assinarCartao($moderador)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "INSERT INTO moderador(idusuario,periodo,valor,data_assinatura,meio_pagamento,cpf,numero_cartao,nome_cartao,cod_cvv,vencimento_cartao) values(?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $moderador->getIdusuario());
            $stmt->bindValue(2, $moderador->getPeriodo());
            $stmt->bindValue(3, $moderador->getValor());
            $stmt->bindValue(4, $moderador->getData_assinatura());
            $stmt->bindValue(5, $moderador->getMeio_pagamento());
            $stmt->bindValue(6, $moderador->getCpf());
            $stmt->bindValue(7, $moderador->getNumero_cartao());
            $stmt->bindValue(8, $moderador->getNome_cartao());
            $stmt->bindValue(9, $moderador->getCvv());
            $stmt->bindValue(10, $moderador->getVencimento_cartao());
            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function assinarPix($moderador)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "INSERT INTO moderador(idusuario,periodo,valor,data_assinatura,meio_pagamento) values(?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $moderador->getIdusuario());
            $stmt->bindValue(2, $moderador->getPeriodo());
            $stmt->bindValue(3, $moderador->getValor());
            $stmt->bindValue(4, $moderador->getData_assinatura());
            $stmt->bindValue(5, $moderador->getMeio_pagamento());
            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function alterarPerfil($moderador)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "UPDATE usuario SET perfil='M' WHERE id_usuario=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $moderador->getIdusuario());
            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function tirarModeracao($idusuario)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "UPDATE usuario SET perfil='U' WHERE id_usuario=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $idusuario);
            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function assinantes()
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "SELECT m.*, u.perfil, u.nome, u.id_usuario
            FROM moderador m
            JOIN usuario u ON m.idusuario = u.id_usuario WHERE u.perfil = 'M';
            ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $retorno = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function deletarModeracao($idusuario)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "DELETE FROM moderador WHERE idusuario=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $idusuario);
            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
