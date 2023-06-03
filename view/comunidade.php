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
<?php
session_start();
if (isset($_GET['id'])) {
  $idtema = $_GET['id'];
} else {
  header("location:home.php");
}
// if( $_SESSION['situacaoUsuario'] != 1) {
//     header("location:home.php?error=Usuário não está logado ou está inativo");
//         exit;
//     }
if (isset($_SESSION['idusuario'])) {
  // Está logado
} else {
  header("Location:./login.php");
}

?>

<!-- trazer tema -->


<?php
require_once "../model/DAO/temaDAO.php";
$temaConn = new temaDAO();
$retorno = $temaConn->exibirTema($idtema);
if ($retorno == null || empty($retorno)) {
  header("location:../view/home.php?msg=Error!");
}
?>

<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Header Section Begin -->
  <?php require_once './menu.php' ?>
  <!-- Header End -->

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
              <div class="anime__details__btn">
                <?php
                if ($_SESSION['perfil'] == 'A') {
                  echo '<a href="./criarChat.php?id=' . $retorno["idtema"] . '"class="follow-btn"> Cadastrar novo chat</a>';
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <div class="anime__details__review">
            <div class="section-title">
              <h4>Chats</h4>
            </div>
          </div>
          <?php
          require_once "../model/DAO/chatDAO.php";
          $chatConn = new chatDAO();
          $chats = $chatConn->exibirChat($idtema);
          foreach ($chats as $chat) {
            echo '<a onclick="atualizarObjectData(\'./chat.php?idchat=' . $chat["idchat"] . '\', event);" href="">' . $chat["titulo"] . '</a><br><br>';
          }
          ?>
        </div>
      </div>
      <object id="chat-object" data="" type="text/html" width="100%" height="400"></object>
  </section>
  <!-- Anime Section End -->
  <?php require_once './footer.php' ?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  function atualizarObjectData(link, event) {
    event.preventDefault(); // Evita o comportamento padrão do clique

    var objectElement = document.getElementById('chat-object');
    objectElement.setAttribute('data', link);
  }
</script>

</html>