<?php
        require_once '../dao/DelegadoDao.php';

                    try {
                        $listaDelegado = DelegadoDao::listardelegado();
                    } catch(Exception $e) {
                        echo '<pre>';
                            print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }
                ?>
<?php foreach($listaDelegado as $Delegado){ ?>
<?php
$numero= 0;
$Cpf=$_POST['cpf'];
$Senha=$_POST['senha'];


if (($Cpf ==  $Delegado['cpfDelegado'] ) && ($Senha == $Delegado['senhaDelegado'] )) {

    $numero = 1;

}
if ($numero == 1) {
    //echo("Certo");
    header("location: ../delegado/index.php");
    $idS= $Delegado['idDelegado'];
    $N=$Delegado['nomeDelegado'];
    session_start();
    $_SESSION['Cpf'] = $Cpf;
    $_SESSION['senha'] = $Senha;
    $_SESSION['nome'] = $N ;
    $_SESSION['numero'] = $numero;
    $_SESSION['id'] = $idS;
    break;
}else {
    //echo("Erro");
    header("location: ../logins/loginDelegado.php");
   
}


?>
<?php } ?>