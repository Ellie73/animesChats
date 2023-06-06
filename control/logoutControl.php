<?php

//logoutControl.php
    session_start();
    session_destroy();
    header("location:../view/home.php?msg=Sua conta foi desconectada");
?>