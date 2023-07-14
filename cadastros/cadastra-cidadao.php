                  
<?php
require_once '../dao/CidadaoDao.php';
require_once("../model/Cidadao.php");



header ("location: ../secretaria/index.php");

$cidadao = new Cidadao();

$cidadao->setNome($_POST['nome']);
$cidadao->setSobrenome($_POST['sobrenome']);
$cidadao->setCpf($_POST['cpf']);
$cidadao->setGenero($_POST['genero']);
$cidadao->setLogradouro($_POST['log']);
$cidadao->setNumLog($_POST['numlog']);
$cidadao->setCep($_POST['cep']);
$cidadao->setComplemento($_POST['comp']);
$cidadao->setBairro($_POST['bairro']);
$cidadao->setCidade($_POST['cidade']);
$cidadao->setIdade($_POST['idade']);
$cidadao->setEmail($_POST['email']);




CidadaoDao::cadastrar($cidadao);
?>