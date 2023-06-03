<?php

session_start();
$valor = $_GET['valor'];
$periodo = $_GET['periodo'];
$dataAtual = date("Y-m-d"); // Obtém a data atual
$dataNova = date("Y-m-d", strtotime("+$periodo months", strtotime($dataAtual)));
if (isset($_SESSION['idusuario'])) {
    // Está logado
} else {
    header("Location:./login.php");
}
if ($_SESSION['perfil'] != 'U') {
    header("Location:./home.php?msg=Já é moderador ou superior!");
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
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php require_once './menu.php' ?>
    <!-- Header End -->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <select id="formaPagamento" onchange="mostrarFormulario(this.value)">
                            <option value="cartao" selected>Cartão</option>
                            <option value="pix">Pix</option>
                        </select>
                        <div id="cartaoDiv">
                            <form action="../control/pagamentoControl.php" method="post">
                                <br><br>
                                <h3 class="card-title">Realizar Pagamento</h3>
                                <div class="mb-3">
                                    <label for="card-number" class="form-label">Número do Cartão</label>
                                    <input type="number" class="form-control" name="numerocartao" id="numerocartao" placeholder="XXXX-XXXX-XXXX-XXXX" required>
                                </div>
                                <div class="mb-3">
                                    <label for="card-name" class="form-label">Nome do propietário</label>
                                    <input type="text" class="form-control" maxlength="100" name="nomecartao" id="nomecartao" placeholder="Nome" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="expiration-date" class="form-label">Data de Termino</label>
                                        <input type="date" class="form-control" value="<?= $dataNova ?>" readonly required>
                                        <input type="number" name="periodo" id="periodo" value="<?= $periodo ?>" hidden required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="expiration-date" class="form-label">Vencimento do cartão</label>
                                        <input type="month" class="form-control" name="vencimento" id="vencimento" placeholder="MM/AA" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="postal-code" class="form-label">CPF</label>
                                        <input type="number" min="00100000000" max="99999999999" class="form-control" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="postal-code" class="form-label">Valor mensal</label>
                                        <input type="number" class="form-control" name="valor" id="valor" step="0.01" value="<?= $valor ?>" readonly required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="postal-code" class="form-label">CVV</label>
                                        <input type="number" class="form-control" id="cvv" name="cvv" placeholder="XXX" min="1" max="999" required>
                                        <input type="text" name="idusuario" id="idusuario" value="<?= $_SESSION['idusuario'] ?>" hidden required>
                                        <input type="text" name="meio" id="meio" value="C" hidden required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger">Pagar</button>
                                <div class="btn btn-outline-dark" onclick="window.history.back()">Cancelar</div>
                            </form>
                        </div>
                        <div id="pixDiv" style="display: none;">
                            <form action="../control/pagamentoControl.php" method="post">
                                <br><br>
                                <h3 class="card-title">Realizar Pagamento</h3>
                                <img src="../img/qr.jpg" alt="">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <p>Chave-Pix:</p>
                                        <p>07726158107</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="postal-code" class="form-label">Valor Mensal</label>
                                        <input type="number" class="form-control" id="postal-code" step="0.01" value="<?= $valor ?>" readonly required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="expiration-date" class="form-label">Data de Termino</label>
                                        <input type="date" class="form-control" value="<?= $dataNova ?>" readonly required>
                                        <input type="number" name="periodo" id="periodo" value="<?= $periodo ?>" hidden required>
                                    </div>
                                </div>
                                <input type="text" name="meio" id="meio" value="P" hidden required>
                                <input type="text" name="idusuario" id="idusuario" value="<?= $_SESSION['idusuario'] ?>" hidden required>
                                <button type="submit" class="btn btn-danger">Pagar</button>
                                <div class="btn btn-outline-dark" onclick="window.history.back()">Cancelar</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>

    <?php require_once './footer.php' ?>
    <script src="../js/pagamento.js"></script>
</body>

</html>