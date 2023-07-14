<?php
        require_once '../dao/SecretariaDao.php';

                    try {
                        $listaSecretaria = SecretariaDao::listarSecretaria();
                    } catch(Exception $e) {
                        echo '<pre>';
                            print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }
                ?>
<?php foreach($listaSecretaria as $secretaria){ ?>
<?php
$Valida= 0;
$Email=$_POST['email'];
$Senha=$_POST['senha'];
$Id= 0;


if (($Email ==  $secretaria['emailSecretaria'] ) && ($Senha == $secretaria['senhaSecretaria'] )) {

    $Valida = 1;

}
if ($Valida == 1) {
    echo("Certo");
    header("location: ../secretaria/index.php");
    session_start();
    $_SESSION['id'] = $secretaria['idSecretaria'];
    $_SESSION['senha'] = $Senha;
    $_SESSION['email'] =  $secretaria['emailSecretaria'];
    $_SESSION['valida'] = $Valida;
    break;
}else {
    echo("Erro");
    //header("location: ../logins/loginSecretaria.php");
   
}


?>
<?php } ?>