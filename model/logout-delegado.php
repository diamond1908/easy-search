<?php
    session_start();
    unset($_SESSION['numero']);
    unset($_SESSION['Cpf']);
    unset($_SESSION['Senha']);
    unset($_SESSION['Nome']);
    unset($_SESSION['secretaria']);
    session_destroy();
    header("Location: ../index.html");
?>