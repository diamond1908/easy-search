<?php require '../model/verifica-logado-delegado.php' ?>
<?php

require_once("../model/Ocorrencia.php");
require_once '../dao/OcorrenciaDao.php';



$Id = $_SESSION['id'];
header ("location: ../delegado/index.php");

$ocorrencia = new Ocorrencia();


$ocorrencia->setDesc($_POST['desc']);
$ocorrencia->setData($_POST['data']);
$ocorrencia->setObjetos($_POST['objetos']);
$ocorrencia->setCep($_POST['cep']);
$ocorrencia->setRelato($_POST['relato']);
$ocorrencia->setHora($_POST['hora']);
$ocorrencia->setCidadao($_POST['cidadao']);
$ocorrencia->setTipo($_POST['tipo']);

OcorrenciaDao::cadastrar($ocorrencia);



?>