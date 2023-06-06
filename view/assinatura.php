<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
    <title>Assinatura</title>
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
                        <h2>Planos de Assinatura</h2>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->


    <div class="plans">
        <div class="card">
            <div class="card-title">
                <h2>Básico</h2>
                <p><i>R$</i><Span>19</Span>,90/mês</p>
            </div>
            <div class="card-content">
                <ul>
                    <li><i class="fa fa-check-circle"></i>Ferramentas exclusivas</li>
                    <li><i class="fa fa-check-circle"></i>Criação de comunidades</li>
                    <li><i class="fa fa-check-circle"></i>Destaque no perfil</li>
                    <li><i class="fa fa-check-circle"></i>1 mês de assinatura</li>
                    <li><i class="fa fa-check-circle"></i>Moderação de diversas comunidades</li>
                </ul>
                <button><a href="./pagamento.php?periodo=1&valor=19.9&tipo=premium">Assinar</a></button>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                <h2>Plus</h2>
                <p><i>R$</i><Span>107</Span>,46/Semestre</p>
                <p><i>R$</i>17,91/mês</p>
            </div>
            <div class="card-content">
                <ul>
                    <li><i class="fa fa-check-circle"></i>Ferramentas exclusivas</li>
                    <li><i class="fa fa-check-circle"></i>Criação de comunidades</li>
                    <li><i class="fa fa-check-circle"></i>Destaque no perfil</li>
                    <li><i class="fa fa-check-circle"></i>6 meses de assinatura</li>
                    <li><i class="fa fa-check-circle"></i>Moderação de diversas comunidades</li>
                    <li><i class="fa fa-check-circle"></i>Desconto de 10%</li>
                </ul>
                <button><a href="./pagamento.php?periodo=6&valor=17.91&tipo=premium">Assinar</a></button>
            </div>
        </div>
        <div class="card">
            <div class="card-title">
                <h2>Premium</h2>
                <p><i>R$</i><Span>191</Span>,04/Ano</p>
                <p><i>R$</i>15,92/mês</p>
            </div>
            <div class="card-content">
                <ul>
                    <li><i class="fa fa-check-circle"></i>Ferramentas exclusivas</li>
                    <li><i class="fa fa-check-circle"></i>Criação de comunidades</li>
                    <li><i class="fa fa-check-circle"></i>Destaque no perfil</li>
                    <li><i class="fa fa-check-circle"></i>1 ano de assinatura</li>
                    <li><i class="fa fa-check-circle"></i>Moderação de diversas comunidades</li>
                    <li><i class="fa fa-check-circle"></i>Desconto de 20%</li>
                    <li><i class="fa fa-check-circle"></i>Mais 1 mês grátis</li>
                </ul>
                <button><a href="./pagamento.php?periodo=12&valor=15.92&tipo=premium">Assinar</a></button>
            </div>
        </div>
    </div>
    <!-- Product Section End -->

    <?php require_once './footer.php' ?>

</body>

</html>