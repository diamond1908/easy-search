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


    
    $valor = $_SESSION['valida'];
    
    if($valor == 0)
    {
       header("Location: ../logins/loginSecretaria.php");
        break;

    }
?>
<?php } ?>