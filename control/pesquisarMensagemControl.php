<?php

require_once '../model/DAO/mensagemDAO.php';

$searchName = $_GET['search'];

$mensagemConn=new mensagemDAO();
$resultados=$mensagemConn->pesquisarMensagem($searchName);

// Verifica se há resultados retornados pela consulta
if (count($resultados) > 0) {
    foreach ($resultados as $row) {
        // Acessa os valores das colunas retornadas na consulta
        $idmensagem = $row['idmensagem'];
        $conteudo = $row['conteudo'];
        $remetente = $row['remetente'];
        $nome = $row['nome'];
        $chat = $row['chat'];
        $data = $row['data'];
        $hora = $row['hora'];

        // Exibe os valores com estilos personalizados
        echo "<p class='result-item'>";
        echo "<span class='result-label'>ID mensagem:</span> $idmensagem<br>";
        echo "<span class='result-label'>ID remetente:</span> $remetente<br>";
        echo "<span class='result-label'>Nome do remetente:</span> $nome<br>";
        echo "<span class='result-label'>ID chat:</span> $chat<br>";
        echo "<span class='result-label'>Conteúdo:</span> $conteudo<br>";
        echo "<span class='result-label'>Data:</span> $data<br>";
        echo "<span class='result-label'>Hora:</span> $hora";
        echo "</p>";
    }
} else {
    echo "<p class='no-result'>Nenhum resultado encontrado.</p>";
}
?>