<?php   
    session_start();
    $NomeSession = $_SESSION['nome'];
    $senhaSession = $_SESSION['senha'];
    
    if($NomeSession != 'adm' || $senhaSession != '123')
    {
        header("Location: ../logins/loginAdm.php");

    }
?>