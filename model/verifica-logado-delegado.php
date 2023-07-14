<?php


session_start();
    $valor = $_SESSION['numero'];
    
    if($valor == 0)
    {
        
        header("Location: ../logins/loginDelegado.php");
        

    }
?>
