<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- verificação -->
<?php
if(isset($_GET['id'])) {
            $idtema=$_GET['id'];
        }else{
            header("location:home.php");
        }
// if( $_SESSION['situacaoUsuario'] != 1) {
//     header("location:home.php?error=Usuário não está logado ou está inativo");
//         exit;
//     }
?>

<!-- trazer tema -->
<?php
    require_once "../model/DAO/temaDAO.php";
    $temaConn = new temaDAO();
    $retorno = $temaConn->exibirTema($idtema);
?>
<h1><?= $retorno["nome"]; ?></h1>

<div>
    <img src="<?= $retorno["fototema"]; ?>" alt="">
    <p>Gênero:<?= $retorno["genero"]; ?></p>
    <p><?= $retorno["tipotema"] ?></p>
    <p>Ano de estreia:<?= $retorno["ano_estreia"] ?></p>
    <p>Quantidade de capítulos ou episódios:<?= $retorno["quantidade"]; ?></p>
    <p>Situação:<?= $retorno["estado"]; ?></p>
</div>
<div>
    <h2>Sinopse:</h2>
    <p><?= $retorno["sinopse"]; ?></p>
</div>    
<?php
    require_once "../model/DAO/chatDAO.php";
    $chatConn = new chatDAO();
    $retorno = $chatConn->exibirChat($idtema);
    foreach($retorno as $chat){
        echo $chat["titulo"]."<br><br>";
    }
?>
</body>
</html>