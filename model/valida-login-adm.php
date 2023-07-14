<?php

$Nome=$_POST['nome'];
$Senha=$_POST['senha'];

if (($Nome == 'adm') && ($Senha == '123')) {

    header("location: ../adm/index.php");
    session_start();
    $_SESSION['nome'] = $Nome;
    $_SESSION['senha'] = $Senha;

}else {
    header ("location: ./erro.php");
}


?>