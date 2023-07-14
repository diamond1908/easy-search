<?php require '../model/verifica-logado-delegado.php' ?>
<?php

require_once("../model/Policial.php");
require_once '../dao/PolicialDao.php';



$Id = $_SESSION['id'];

header ("location: ../delegado/index.php");

$policial = new policial();

$policial->setNome($_POST['nome']);
$policial->setSobrenome($_POST['sobrenome']);
$policial->setCpf($_POST['cpf']);
$policial->setGenero($_POST['genero']);
$policial->setLogradouro($_POST['log']);
$policial->setNumLog($_POST['numlog']);
$policial->setCep($_POST['cep']);
$policial->setComplemento($_POST['comp']);
$policial->setBairro($_POST['bairro']);
$policial->setCidade($_POST['cidade']);
$policial->setSenha($_POST['senha']);
$policial->setIdade($_POST['idade']);
$policial->setMatricula($_POST['matricula']);


PolicialDao::cadastrar($policial);
?>