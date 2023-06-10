<?php
session_start();
if (isset($_SESSION['idusuario'])) {
    // Está logado
} else {
    header("Location:./login.php");
}
if ($_SESSION['perfil'] != 'A') {
    header("Location:./home.php?msg=Acesso negado!");
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Animes Chats</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/plyr.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/cadastroTema.css">
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body style='background-color:#cccbcb'>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php require_once './menu.php' ?>
    <!-- Header End -->
    <div class="container mt-5">
        <h1 class="crud">Denúncias</h1>
        <br><br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID da denúcia</th>
                        <th>Id do Denunciante</th>
                        <th>Ocorrência</th>
                        <th>Contato</th>
                        <th>...</th>
                    </tr>
                </thead>
                <?php
                //temas
                require_once "../model/DAO/denunciaDAO.php";
                $denunciaConn = new denunciaDAO();
                $denuncias = $denunciaConn->verDenuncias();
                foreach ($denuncias as $denuncia) {
                ?>
                    <tbody>
                        <tr>
                            <td><?= $denuncia["iddenuncia"] ?></td>
                            <td><?= $denuncia["iddenunciante"] ?></td>
                            <td><?= $denuncia["ocorrencia"] ?></td>
                            <td><?= $denuncia["contato"] ?></td>
                            <td>
                                <a href="../control/deletarDenuncia.php?iddenuncia=<?= $denuncia['iddenuncia'] ?>" style="color:white;"><button class="btn btn-dark"><i class="material-icons">delete</i></button></a>
                            </td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
            <div>
                <br><br><br>
                <button class="site-btn"><a href="./adm.php"><i class="material-icons">account_circle</i> Ver usuários do sistema</a></button>
                <button class="site-btn"><a href="./pesquisarMensagem.php"><i class="material-icons">chat</i> Ver mensagens do sistema</a></button>
            </div>
            <br><br><br>
        </div>
    </div>
    <?php require_once './footer.php' ?>
    <script src="../js/foto.js"></script>
</body>