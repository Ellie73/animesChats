<?php
session_start();

// Destruir a sessão do usuário
session_destroy();

// Redirecionar o usuário para a página inicial
header("Location:./home.php");
exit;
?>
