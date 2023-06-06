</html>
<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
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
            <div class="col-lg-6">
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
            <div class="col-lg-6">
                <div class="col-md-6">
                    <h4>Denunciar</h4>
                    <ul class="footer-links">
                        <li><a href="./">Fazer uma denúncia</a></li>
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
            </script> Todos os direitos reservados
        </p>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search model Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Pesquise aqui.....">
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
<script src="../js/jquery.nice-select.min.js"></script>
<script src="../js/mixitup.min.js"></script>
<script src="../js/jquery.slicknav.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>