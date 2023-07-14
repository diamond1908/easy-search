<?php require '../model/verifica-logado-delegado.php' ?>
<?php

require_once("../model/Multa.php");
require_once '../dao/MultaDao.php';
require_once '../model/Veiculo.php';



$Id = $_SESSION['id'];
header ("location: ../delegado/index.php");

$Multa = new Multa();


 $Multa->setMotivo($_POST['motivo']);
 $Multa->setValor($_POST['valor']);
 $Multa->setHora($_POST['hora']);
 $Multa->setData($_POST['data']);
 $Multa->setCep($_POST['cep']);
 $Multa->setLog($_POST['log']);
 $Multa->setBairro($_POST['bairro']);
 $Multa->setCidade($_POST['cidade']);
 $Veiculo = new Veiculo();
 $Veiculo->setId($_POST['veiculo']);
 $Multa->setVeiculo($Veiculo);
MultaDao::cadastrar($Multa);



?>