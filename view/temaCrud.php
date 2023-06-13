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
        <h1 class="crud">Temas cadastrados no sistema</h1>
        <br><br>
        <?php
        if (!isset($_GET["idtema"]) || $_GET["idtema"] == 0) {
        ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID do tema</th>
                            <th>Nome</th>
                            <th>Gênero</th>
                            <th>Ano de estreia</th>
                            <th>Estado</th>
                            <th>Tipo</th>
                            <th>Alterar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <?php
                    //temas
                    require_once "../model/DAO/temaDAO.php";
                    $temaConn = new temaDAO();
                    $retorno = $temaConn->listarTema();
                    foreach ($retorno as $tema) {
                    ?>
                        <!-- encontrar o usuario -->
                        <tbody>
                            <tr>
                                <td><?= $tema["idtema"] ?></td>
                                <td><?= $tema["nome"] ?></td>
                                <td><?= $tema["genero"] ?></td>
                                <td><?= $tema["ano_estreia"] ?></td>
                                <td><?= $tema["estado"] ?></td>
                                <td><?= $tema["tipotema"] ?></td>
                                <td>
                                    <a href="?idtema=<?= $tema["idtema"] ?>" style="color:white;"><button class="btn btn-danger"><i class="material-icons">create</i></button></a>

                                </td>
                                <td>
                                    <a href="../control/deletarTema.php?idtema=<?= $tema["idtema"] ?>&nome=<?= $tema["nome"] ?>" style="color:white;"><button class="btn btn-dark"><i class="material-icons">delete</i></button></a>
                                </td>
                            </tr>
                        </tbody>
                    <?php
                    }
                    ?>
                </table>
                <div>
                    <button class="site-btn"><a href="./cadastroTema.php"><i class="material-icons">control_point</i> Cadastrar novo Tema</a></button>
                </div>
                <br><br><br>
            </div>
    </div>

<?php
        } else {
            //consultar usuario
            require_once "../model/DAO/temaDAO.php";
            $temaConn = new temaDAO();
            $id = $_GET["idtema"];
            $tema = $temaConn->verTema($id);
?>
    <!-- alterar usuario -->
    <div class="flex">
        <section>
            <form action="../control/alterarTema.php" method="POST" class="form-alterar-usuario" enctype="multipart/form-data">
                <div>
                    <a href="?idtema=0" style="float:right;color:#424874;font-size:25px;font-weight:bold">Fechar</a><br>
                    <h3 class="mb-3" style="text-align: center;">Alterar Tema</h3>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" id="nome" name="nome" value="<?= $tema["nome"] ?>" class="form-control">
                    </div>
                    <div class="col">
                        <label for="genero" class="form-label">Gênero:</label>
                        <input type="text" id="genero" name="genero" value="<?= $tema["genero"] ?>" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sinopse" class="form-label">Sinopse:</label>
                        <textarea class="form-control" name="sinopse" id="sinopse" cols="30" rows="10"><?= $tema["sinopse"] ?></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div>
                            <label for="estado" class="form-label">Status de publicação:</label>
                        </div>
                        <div>
                            <select name="estado" id="estado" class="form-select">
                                <?php if ($tema["estado"] == "Em andamento") : ?>
                                    <option value="Em andamento" selected>Em andamento</option>
                                    <option value="Finalizado">Finalizado</option>
                                <?php else : ?>
                                    <option value="Em andamento">Em andamento</option>
                                    <option value="Finalizado" selected>Finalizado</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="foto" class="form-label">Foto do tema:</label>
                        <input type="file" id="foto" name="foto" src="<?= $tema["fototema"] ?>" hidden>
                        <div class="d-flex mb-3">
                            <div style="margin-right: 20px;cursor: pointer;">
                                <img id="preview-foto" title="Selecione uma foto..." src="<?= $tema["fototema"] ?>" class="rounded-circle me-3" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <label for="tipo" class="form-label">Tipo:</label>
                            <br>
                            <input type="radio" id="anime" name="tipo" value="Anime" required <?php if ($tema['tipotema'] == 'Anime') {
                                                                                                    echo 'checked';
                                                                                                } ?>>
                            <label for="anime">Anime</label>
                            <br>
                            <input type="radio" id="manga" name="tipo" value="Mangá" required <?php if ($tema['tipotema'] == 'Mangá') {
                                                                                                    echo 'checked';
                                                                                                } ?>>
                            <label for="mangá">Mangá</label>
                            <br>
                            <input type="radio" id="manhwa" name="tipo" value="Manhwa" required <?php if ($tema['tipotema'] == 'Manhwa') {
                                                                                                    echo 'checked';
                                                                                                } ?>>
                            <label for="manhwa">Manhwa</label>
                            <br>
                            <input type="radio" id="manhua" name="tipo" value="Manhua" required <?php if ($tema['tipotema'] == 'Manhua') {
                                                                                                    echo 'checked';
                                                                                                } ?>>
                            <label for="manhua">Manhua</label>
                            <br>
                            <input type="radio" id="webtoon" name="tipo" value="Webtoon" required <?php if ($tema['tipotema'] == 'Webtoon') {
                                                                                                        echo 'checked';
                                                                                                    } ?>>
                            <label for="webtoon">Webtoon</label>
                            <br><br>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="estreia" class="form-label">Ano de estreia:</label>
                        <input type="number" name="estreia" id="estreia" min="1" max="2024" value="<?= $tema["ano_estreia"] ?>" required class="form-control">
                    </div>
                    <div class="col">
                        <label for="quantidade" class="form-label">Capítulos ou episódios:</label>
                        <input type="number" name="quantidade" id="quantidade" min="1" value="<?= $tema["quantidade"] ?>" class="form-control">
                    </div>
                </div>
                <input type="hidden" value="<?= $id ?>" name="idtema" id="idtema">
                <input type="hidden" value="<?= $tema['fototema'] ?>" name="fotoantiga" id="fotoantiga">
                <div>
                    <button type="submit" class="btn btn-danger" value="submit" id="submit" name="submit">Salvar</button>
                </div>
            </form>
        </section>
        </div>
    <br><br>
    </div>
<?php
        }
?>

<?php require_once './footer.php' ?>
<script src="../js/foto.js"></script>
</body>