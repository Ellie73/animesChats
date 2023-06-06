<?php
session_start();
if (isset($_SESSION['idusuario'])) {
    // Está logado
} else {
    header("Location:./login.php");
}
if ($_SESSION['perfil'] != 'A' and isset($_SESSION['idusuario'])) {
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
    <title>Ferramentas</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./css/plyr.css" type="text/css">
    <link rel="stylesheet" href="./css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
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

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="../img/02.jpeg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Ferramentas do Administrador</h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Blog Section Begin -->
    <!-- <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog__item set-bg" data-setbg="../img/blog/blog-1.png" style="cursor: pointer;" onclick="window.location.href='./adm.php'" class="rounded-circle me-3" style="width: 2em; height: 2em; object-fit: cover;">
                                <div class="blog__item__text">
                                    <h4><a href="./adm.php"></a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="../img/blog/blog-4.png" style="cursor: pointer;" onclick="window.location.href='./cadastroTema.php'">
                                <div class="blog__item__text">
                                    <h4><a href="#"></a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="../img/blog/blog-5.png" style="cursor: pointer;" onclick="window.location.href='./cadastroTema.php'">
                                <div class="blog__item__text">
                                    <h4><a href="#"></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="../img/blog/blog-2.png" style="cursor: pointer;" onclick="window.location.href='./cadastroTema.php'">
                                <div class="blog__item__text">
                                    <h4><a href="#"></a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item small__item set-bg" data-setbg="../img/blog/blog-3.png" style="cursor: pointer;" onclick="window.location.href='./cadastroTema.php'">
                                <div class="blog__item__text">
                                    <h4><a href="#"></a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="blog__item set-bg" data-setbg="../img/blog/blog-6.png" style="cursor: pointer;" onclick="window.location.href='./cadastroTema.php'">
                                <div class="blog__item__text">
                                    <h4><a href="./cadastroTema.php"></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <div class="image-session">
    <div class="image-container">
      <img src="../img/blog/blog-1.png" alt="Imagem 1" onclick="window.location.href='./adm.php'">
      <label for="imagem1">USUÁRIOS</label>
    </div>
    <div class="image-container">
      <img src="../img/blog/blog-4.png" alt="Imagem 2" onclick="window.location.href='./comunidadeCrud.php'">
      <label for="imagem2">COMUNIDADES</label>
    </div>
    <div class="image-container">
      <img src="../img/blog/blog-5.png" alt="Imagem 3" onclick="window.location.href='./cadastroTema.php'">
      <label for="imagem3">ASSINANTES</label>
    </div>
    <div class="image-container">
      <img src="../img/blog/blog-2.png" alt="Imagem 4" onclick="window.location.href='./temaCrud.php'">
      <label for="imagem4">CHATS</label>
    </div>
    <div class="image-container">
      <img src="../img/blog/blog-3.png" alt="Imagem 5" onclick="window.location.href='./cadastroTema.php'">
      <label for="imagem5">DENÚNCIAS</label>
    </div>
    <div class="image-container" onclick="window.location.href='./temaCrud.php'">
      <img src="../img/blog/blog-6.png" alt="Imagem 6">
      <label for="imagem6">TEMAS</label>
    </div>
  </div>
  <br><br><br>
    <!-- Blog Section End -->

    <?php require_once './footer.php' ?>
    <style>
    .image-session {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      cursor: pointer;
    }
    
    .image-session .image-container {
      width: 33.33%;
      padding: 10px;
      box-sizing: border-box;
      text-align: center;
    }
    
    .image-session .image-container img {
      width: 100%;
      max-width: 200px;
      height: auto;
    }
    
    .image-session .image-container label {
      display: block;
      margin-top: 5px;
      cursor: pointer;
    }
  </style>


</body>

</html>