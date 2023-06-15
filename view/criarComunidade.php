<?php
session_start();
if (isset($_SESSION['idusuario'])) {
    // Está logado
} else {
    header("Location:./login.php");
}
if ($_SESSION['perfil'] != 'A' && $_SESSION['perfil'] != 'M') {
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
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php require_once './menu.php' ?>
    <!-- Header End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-left">
                    <div class="normal__breadcrumb__texto">
                        <h2>Criar uma nova comunidade</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3></h3>
                        <form action="../control/criarComunidade.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="input__item">
                                    <input type="text" name="nome" id="nome" class="inputUser" placeholder="Nome da comunidade" maxlength="100" required>
                                    <span class="icon_pencil"></span>
                                </div>
                                <div class="inputBox">
                                    <textarea name="descricao" id="descricao" cols="80" rows="10" class="inputUser" placeholder="Descrição da comunidade..." maxlength="3000" required></textarea>
                                </div>
                                <h5>Tema da comunidade: </h5>
                                <br>
                                <div><i class="material-icons">assignment</i>
                                    <select name="tema" id="tema" required class="js-example-basic-single">
                                        <option value="0" selected>Nenhum</option>
                                        <?php
                                        require_once "../model/DAO/temaDAO.php";
                                        $temaConn = new temaDAO();
                                        $retorno = $temaConn->listarTema();
                                        foreach ($retorno as $tema) {
                                        ?>
                                            <option value="<?= $tema['idtema'] ?>"><?= $tema['nome'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <br>
                                <br>
                                <div class="inputBox">
                                    <label class="picture" for="foto" tabIndex="0">
                                        <span class="picture__image">Escolha uma foto</span>
                                    </label>
                                    <input type="file" name="foto" id="foto" required>
                                </div>
                                <p>***Somente JPG jpg jpeg png</p>
                                <br>
                            </fieldset>
                            <button type="submit" name="submit" id="submit" class="btn btn-danger">Cadastrar</button>
                            <button class="btn btn-outline-dark" onclick="window.history.back()">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->

   <!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="col-md-6">
                    <h4>Categorias</h4>
                    <ul class="footer-links">
                        <li><a href="./pesquisarTema.php?type=anime&page=1">Anime</a></li>
                        <li><a href="./pesquisarTema.php?type=manga&page=1">Mangá</a></li>
                        <li><a href="./pesquisarTema.php?type=manhwa&page=1">Manhwa</a></li>
                        <li><a href="./pesquisarTema.php?type=manhua&page=1">Manhua</a></li>
                        <li><a href="./pesquisarTema.php?type=webtoon&page=1">Webtoon</a></li>
                    </ul>
                    <br>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="col-md-6">
                    <h4>Acesso rápido</h4>
                    <ul class="footer-links">
                        <li><a href="./homeComunidade.php">Comunidades</a></li>
                        <li><a href="./assinatura.php">Assinatura</a></li>
                        <?php
                            // Verifica se o usuário está logado 
                            if (isset($_SESSION['idusuario'])) {
                                echo '<li><a href="./logout.php">Sair da conta</a></li>';
                            } else {
                                echo '<li><a href="./login.php">Fazer login</a></li>';
                                echo '<li><a href="./cadastroUsuario.php">Cadastre-se</a></li>';
                            }
                        ?>
                    </ul>
                    <br>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="col-md-6">
                    <h4>Denunciar <i class="fa fa-warning"></i></h4>
                    <ul class="footer-links">
                        <li><a href="./denunciar.php">Fazer uma denúncia</a></li>
                        <li><a href="./termos.php">Termos de uso</a></li>
                    </ul>
                    <br>
                </div>
            </div>
        </div>
        <p>
            Copyright &copy;
            <script>
                document.write(new Date().getFullYear());
            </script> Todos os direitos reservados a Animes Chats.
        </p>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form" action="./procura.php" method="GET">
            <input type="text" id="search-input" name="search-input" placeholder="Pesquise aqui...">
        </form>
    </div>
</div>
<!-- Search model end -->
<?php
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
              Swal.fire("' . $msg . '");
            });
          </script>';
}
?>

<!-- Js Plugins -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/player.js"></script>
<script src="../js/mixitup.min.js"></script>
<script src="../js/jquery.slicknav.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>


</body>
<script src="../js/./fotoCadastro.js"></script>

</html>