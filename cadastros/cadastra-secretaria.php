<?php

require_once("../model/Secretaria.php");
require_once '../dao/SecretariaDao.php';


header ("location: ../adm/index.php");

$secretaria = new Secretaria();


$secretaria->setSenha($_POST['senha']);
$secretaria->setEmail($_POST['email']);
$secretaria->setLogradouro($_POST['log']);
$secretaria->setNumLog($_POST['numlog']);
$secretaria->setCep($_POST['Cep']);
$secretaria->setBairro($_POST['Bairro']);
$secretaria->setCidade($_POST['cidade']);


SecretariaDao::cadastrar($secretaria);
?>