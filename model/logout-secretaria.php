<?php
    session_start();
    unset($_SESSION['valida']);
    unset($_SESSION['Id']);
    unset($_SESSION['Senha']);
    unset($_SESSION['email']);
    session_destroy();
    header("Location: ../index.html");
?>