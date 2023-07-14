<?php require '../model/verifica-logado-delegado.php' ?>
<?php

require_once("../model/ocorrenciaVeiculo.php");
require_once '../dao/ocorrenciaVeiculoDao.php';
require_once '../model/Veiculo.php';
require_once '../model/TipoVeiculo.php';



$Id = $_SESSION['id'];
header ("location: ../delegado/index.php");

$ocorrenciaVeiculo = new ocorrenciaVeiculo();


 $ocorrenciaVeiculo->setDesc($_POST['desc']);
 $ocorrenciaVeiculo->setData($_POST['data']);
 $ocorrenciaVeiculo->setObjetos($_POST['objeto']);
 $ocorrenciaVeiculo->setCep($_POST['cep']);
 $ocorrenciaVeiculo->setHora($_POST['hora']);
 $ocorrenciaVeiculo->setRelato($_POST['relato']);
 $ocorrenciaVeiculo->setVeiculo($_POST['veiculo']);
 $ocorrenciaVeiculo->setTipo($_POST['tipo']);

 ocorrenciaVeiculoDao::cadastrar($ocorrenciaVeiculo);


?>