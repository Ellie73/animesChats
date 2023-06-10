<?php
session_start();
if (isset($_SESSION['idusuario'])) {
    // Está logado
} else {
    header("Location:./login.php");
}
if ($_SESSION['perfil'] != 'M') {
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
        <h1 class="crud">Suas comunidades</h1>
        <br><br>
        <?php
        if (!isset($_GET["idcomunidade"]) || $_GET["idcomunidade"] == 0) {
        ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID da comunidade</th>
                            <th>Nome</th>
                            <th>Situação</th>
                            <th>Tema</th>
                            <th>Alterar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>

                    <?php
                    //comunidades
                    require_once "../model/DAO/comunidadeDAO.php";
                    $comunidadeConn = new comunidadeDAO();
                    $comunidades = $comunidadeConn->listarComunidadesMod($_SESSION['idusuario']);
                    if ($comunidades == null || $comunidades == 0) {
                        echo 'Você ainda não possui uma comunidade!!<br>';
                    }
                    foreach ($comunidades as $comunidade) {
                    ?>
                        <!-- encontrar o usuario -->
                        <tbody>
                            <tr>
                                <td><?= $comunidade["idcomunidade"] ?></td>
                                <td><?= $comunidade["nome"] ?></td>
                                <td><?php if ($comunidade["situacao"] == 1) {
                                        echo "Ativo";
                                    } else {
                                        echo "Inativo";
                                    } ?></td>
                                <td><?= $comunidade['idtema'] ?></td>
                                <td>
                                    <a href="?idcomunidade=<?= $comunidade["idcomunidade"] ?>" style="color:white;"><button class="btn btn-danger"><i class="material-icons">create</i></button></a>
                                </td>
                                <td>
                                    <a href="../control/deletarComMod.php?idcomunidade=<?= $comunidade["idcomunidade"] ?>&&nome=<?= $comunidade["nome"] ?>&&idcriador=<?= $comunidade['idcriador'] ?>" style="color:white;"><button class="btn btn-dark"><i class="material-icons">delete</i></button></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php
                    }
                    ?>
                </table>
                <br>
                <div>
                    <button class="site-btn"><a href="./criarComunidade.php"><i class="material-icons">control_point</i> Criar uma nova Comunidade</a></button>
                </div>
                <br><br><br>
            </div>
    </div>
<?php
        } else {
            //consultar usuario
            require_once "../model/DAO/comunidadeDAO.php";
            $comunidadeConn = new comunidadeDAO();
            $id = $_GET["idcomunidade"];
            $comunidade = $comunidadeConn->verComunidade($id);
?>
    <!-- alterar usuario -->
    <div class="flex">
        <section>
            <form action="../control/alterarComunidadeMod.php" method="POST" class="form-alterar-usuario" enctype="multipart/form-data">
                <div>
                    <input type="text" name="idcomunidade" value="<?= $id ?>" hidden> <br>
                    <a href="?idcomunidade=0" style="float:right;color:#424874;font-size:25px;font-weight:bold">Fechar</a><br>
                    <h3 class="mb-3" style="text-align: center;">Alterar Comunidade</h3>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" id="nome" name="nome" value="<?= $comunidade["nome"] ?>" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="descricao" class="form-label">Descrição:</label>
                        <input type="text" id="descricao" name="descricao" value="<?= $comunidade["descricao"] ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3" style="margin: 0px 3px;">
                    <div class="col">
                        <label for="foto" class="form-label">Foto da comunidade:</label>
                        <input type="file" id="foto" name="foto" hidden>
                        <div class="d-flex mb-3">
                            <div style="margin-right: 20px;cursor: pointer;">
                                <img id="preview-foto" title="Selecione uma foto..." src="<?= $comunidade["foto"] ?>" class="rounded-circle me-3" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                            <input type="hidden" value="<?= $comunidade["foto"] ?>" name="fotoantiga" id="fotoantiga">
                        </div>
                    </div>

                </div>
                <div class="row mb-3" style="margin: 0px 5px;">
                    <div>
                        <label for="tema">Tema:</label>
                        <div>
                            <select name="tema" id="tema" required>
                                <option value="<?= $comunidade['idtema'] ?>" selected><?= $comunidade["nome_tema"] ?></option>
                                <?php
                                require_once "../model/DAO/temaDAO.php";
                                $temaConn = new temaDAO();
                                $temas = $temaConn->listarTema();
                                foreach ($temas as $tema) {
                                ?>
                                    <option value="<?= $tema['idtema'] ?>"><?= $tema['nome'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3" style="margin: 0px 5px;">
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" required>
                        <label class="form-check-label">Ao clicar em "Salvar" você está ciente de que os dados serão <b>alterados</b> do sistema.</label>
                    </div>
                    <div>
                        <button type="submit" name="submit" class="btn btn-danger">Salvar</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
    <br><br><br><br>
    </div>
<?php
        }
?>

<?php require_once './footer.php' ?>
<script src="../js/foto.js"></script>
</body>