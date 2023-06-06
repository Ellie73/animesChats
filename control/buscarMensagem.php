
<?php
session_start();
require_once '../model/DTO/mensagemDTO.php';
require_once '../model/DAO/mensagemDAO.php';

if ( isset( $_GET['id'] ) ) {
    $idchat = $_GET['id'];}

$mensagemConn = new mensagemDAO();
$mensagens  = $mensagemConn->exibirMensagem( $idchat );
foreach ( $mensagens as $mensagem ) {
    echo '
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="anime__details__review">
                <div class="anime__review__item">
                    <div class="anime__review__item__pic">
                        <a href=anime-watching.html><img src="'.$mensagem['foto'].'" alt=""></a>
                    </div>
                    <div class="anime__review__item__text">
                        <h6>'.$mensagem['nome'].' - <span>'.date("d/m/Y", strtotime($mensagem['data'])).'</span></h6>
                        <p style="font-size:1em;">' . $mensagem['conteudo'] . '</p>
                        <p><span>'.date("H:i", strtotime($mensagem['hora'])).'</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>';
}
echo"<br><br>";
?>

 