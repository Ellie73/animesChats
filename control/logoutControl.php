<?php

//logoutControl.php
    session_start();
    session_destroy();
    header("location:../view/home.php?msg=Saída efetuada com sucesso!");
?>