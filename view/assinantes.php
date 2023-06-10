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
        <h1 class="crud">Assinantes do sistema</h1>
        <p class="crud">*** Moderadores ativos ***</p>
        <br><br>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Usuário</th>
                        <th>ID Moderador</th>
                        <th>Nome</th>
                        <th>Data de Assinatura</th>
                        <th>Vencimento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //assinantes
                    require_once "../model/DAO/moderadorDAO.php";
                    $moderadorConn = new moderadorDAO();
                    $moderadores = $moderadorConn->assinantes();
                    foreach ($moderadores as $moderador) {
                        $periodo = $moderador['periodo'];
                        $dataInicio = $moderador['data_assinatura'];
                        $dataAtual = date("Y-m-d"); // Obtém a data atual
                        $dataTermino = date("Y-m-d", strtotime("+$periodo months", strtotime($dataInicio)));

                        $tableRowClass = (strtotime($dataAtual) > strtotime($dataTermino)) ? 'table-danger' : '';

                    ?>
                        <tr class="<?php echo $tableRowClass; ?>">
                            <td><?= $moderador["id_usuario"] ?></td>
                            <td><?= $moderador["idmoderador"] ?></td>
                            <td><?= $moderador["nome"] ?></td>
                            <td><?= $moderador["data_assinatura"] ?></td>
                            <td><?= $dataTermino ?></td>
                            <td>
                                <a href="../control/cancelarModerador.php?idusuario=<?= $moderador['id_usuario'] ?>" style="color:white;">
                                    <button class="btn btn-dark">Remover Moderação</button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php require_once './footer.php' ?>

    <!-- Scripts -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/plyr.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>
