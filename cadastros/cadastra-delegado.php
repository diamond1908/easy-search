<?php

require_once("../model/Delegado.php");
require_once "../model/Secretaria.php";
require_once '../dao/DelegadoDao.php';


session_start();
$IdSession = $_SESSION['id'];

header("Location: ../secretaria/index.php");

$delegado = new Delegado();


$delegado->setNome($_POST['nome']);
$delegado->setSobrenome($_POST['sobrenome']);
$delegado->setCpf($_POST['cpf']);
$delegado->setGenero($_POST['genero']);
$delegado->setLogradouro($_POST['log']);
$delegado->setNumLog($_POST['numlog']);
$delegado->setCep($_POST['cep']);
$delegado->setComplemento($_POST['comp']);
$delegado->setBairro($_POST['bairro']);
$delegado->setCidade($_POST['cidade']);
$delegado->setSenha($_POST['senha']);
$delegado->setSecretaria($IdSession);



DelegadoDao::cadastrar($delegado);
?>