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
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
session_start();
if (isset($_GET['id'])) {
    $idtema = $_GET['id'];
} elseif (empty($_GET['id'])) {
    header("location:home.php?msg=Página não encontrada!");
}
if (isset($_SESSION['idusuario'])) {
    // Está logado
} elseif (empty($_SESSION['idusuario'])) {
    header("Location:./login.php?msg=Faça login para acessar!");
}

?>

<!-- trazer tema -->


<?php
require_once "../model/DAO/temaDAO.php";
$temaConn = new temaDAO();
$retorno = $temaConn->exibirTema($idtema);
if ($retorno == null || empty($retorno)) {
    header("location:../view/home.php?msg=Página não encontrada!");
}
require_once '../model/DAO/avaliacaoDAO.PHP';
require_once '../model/DTO/avaliacaoDTO.PHP';
?>

<body>
    <div class="overlay"></div>
    <div class="avaliacao">
        <div class="nota-tema"></div>
        <div class="avaliacoes"></div>

        <form action="../control/avaliarControl.php/" method="POST">
            <div class="estrelas">
                <label for="estrela_um"><i class="fa"></i></label>
                <input type="radio" id="estrela_um" name="nota" value="1" required>

                <label for="estrela_dois"><i class="fa"></i></label>
                <input type="radio" id="estrela_dois" name="nota" value="2" required>

                <label for="estrela_tres"><i class="fa"></i></label>
                <input type="radio" id="estrela_tres" name="nota" value="3" required>

                <label for="estrela_quatro"><i class="fa"></i></label>
                <input type="radio" id="estrela_quatro" name="nota" value="4" required>

                <label for="estrela_cinco"><i class="fa"></i></label>
                <input type="radio" id="estrela_cinco" name="nota" value="5" required checked>
            </div>
            <input class="form-control" type="text" name="comentario" id="comentario" placeholder="Dê a sua opnião aqui..." required>
            <input type="hidden" name="idusuario" id="idusuario" value="<?= $_SESSION['idusuario'] ?>">
            <input type="hidden" name="idtema" id="idtema" value="<?= $idtema ?>">
            <br>
            <button class="btn btn-danger" type="submit" value="Enviar Avaliação">Avaliar</button>
        </form>
    </div>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php require_once './menu.php' ?>
    <!-- Header End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./home.php"><i class="fa fa-home"></i> Home</a>
                        <a href="#">Categorias</a>
                        <span><a href="./pesquisarTema.php?type=<?= $retorno["tipotema"] ?>&page=1"><?= $retorno["tipotema"] ?></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="<?= $retorno["fototema"]; ?>">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3><?= $retorno["nome"]; ?></h3>
                                <!-- <span>フェイト／ステイナイト, Feito／sutei naito</span> -->
                            </div>
                            <div class="anime__details__rating">
                                <a href="" class="modal-link" title="Comente e avalie aqui">
                                    <div class="rating">
                                        <?php
                                        require_once '../model/DAO/avaliacaoDAO.php';
                                        $avaliacaoConn = new avaliacaoDAO();
                                        $nota = $avaliacaoConn->calcularAvaliacao($idtema);
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $nota) {
                                                echo '<i class="fa fa-star"></i>';
                                            } else {
                                                echo '<i class="fa fa-star-o"></i>';
                                            }
                                        }
                                        ?>
                                    </div>
                                </a>
                                <?php
                                $total = $avaliacaoConn->totalNotas($idtema);
                                echo '<span>' . $total . ' Voto(s)</span>';
                                ?>
                            </div>
                            <p><?= $retorno["sinopse"]; ?></p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>Tipo:</span><?= $retorno["tipotema"] ?></li>
                                            <li><span>Cap/Ep:</span><?= $retorno["quantidade"]; ?></li>
                                            <li><span>Ano de estreia:</span><?= $retorno["ano_estreia"] ?></li>
                                            <li><span>Status:</span><?= $retorno["estado"]; ?></li>
                                            <li><span>Genêro:</span><?= $retorno["genero"]; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h4>Comunidades de <?= $retorno["nome"]; ?></h4>
                            <br><br>
                            <div class="row">
                                <?php
                                //comunidades
                                require_once "../model/DAO/comunidadeDAO.php";
                                $comunidadeConn = new comunidadeDAO();
                                $comunidades = $comunidadeConn->listarComunidadesTema($idtema);
                                foreach ($comunidades as $comunidade) {
                                ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <div class="product__item">
                                            <a href="./comunidade.php?id=<?= $comunidade["idcomunidade"] ?>">
                                                <div class="product__item__pic set-bg" data-setbg="<?= $comunidade["foto"] ?>">
                                                </div>
                                            </a>
                                            <br>
                                            <div class="product__item__text">
                                                <h5><a href="./comunidade.php?id=<?= $comunidade["idcomunidade"] ?>"><?= $comunidade["nome"] ?></a></h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <?php
                            if ($comunidades == null || $comunidades == 0) {
                                echo '<h3>' . $retorno["nome"] . ' não possui comunidades ainda <i class="fa fa-frown-o"></i></h3>';
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h4>Avaliações</h4>
                            <br><br>
                            <div class="row">
                                <?php
                                $avaliacoes = $avaliacaoConn->exibirAvaliacoes($idtema);
                                foreach ($avaliacoes as $avaliacao) {
                                ?>
                                <div class="col-lg-8 col-md-8">
                                    <div class="anime__details__review">
                                        <div class="anime__review__item">
                                            <div class="anime__review__item__pic">
                                                <a><img src="<?=$avaliacao['foto']?>" alt=""></a>
                                            </div>
                                            <div class="anime__review__item__text">
                                                <h6><?=$avaliacao['nome']?><span>
                                                <?php
                                                for ($i = 1; $i <= 5; $i++) {
                                                if ($i <= $avaliacao['nota']) {
                                                    echo '<i class="fa fa-star"></i>';
                                                } else {
                                                    echo '<i class="fa fa-star-o"></i>';
                                                }
                                                }?>
                                                </span></h6>
                                                <p style="font-size:1em;"><?=$avaliacao['comentario']?></p>
                                                <p><span></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                                </div>
                                <?php
                                if ($avaliacoes == null || $avaliacoes == 0){
                                    echo '<h3>' .$retorno["nome"].' não recebeu avaliações ainda <i class="fa fa-frown-o"></i></h3>';
                                }       
                                ?>     
                        </div>

                    </div>
                </div>
    </section>

    <?php require_once './footer.php' ?>

</body>
<script>
    // Seleciona o link e a janela modal
    var link = document.querySelector('.modal-link');
    var avaliacao = document.querySelector('.avaliacao');
    var overlay = document.querySelector('.overlay');

    // Adiciona um listener de evento para o link
    link.addEventListener('click', function(event) {
        event.preventDefault(); // previne o comportamento padrão do link (navegar para outra página)

        overlay.style.display = 'block'; // exibe a camada escura
        avaliacao.style.display = 'block'; // exibe a janela modal
    });

    // Adiciona um listener de evento para a camada escura
    overlay.addEventListener('click', function() {
        overlay.style.display = 'none'; // oculta a camada escura
        avaliacao.style.display = 'none'; // oculta a janela modal
    });
</script>

</html>