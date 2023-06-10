<?php
class denunciaDAO
{
    public function denunciar($denuncia)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "INSERT INTO denuncia(iddenunciante,	ocorrencia,	contato) values(?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $denuncia->getIdDenunciante());
            $stmt->bindValue(2, $denuncia->getOcorrencia());
            $stmt->bindValue(3, $denuncia->getContato());
            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function verdenuncias()
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "SELECT * FROM denuncia";

            $stmt = $conn->prepare($sql);
            $retorno = $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function deletardenuncia($iddenuncia)
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=anime-chats;charset=utf8', "root", "");

            $sql = "DELETE FROM denuncia WHERE iddenuncia=?";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $iddenuncia);
            $retorno = $stmt->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>