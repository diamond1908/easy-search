<?php

require_once("../model/Cor.php");
require_once '../dao/AtributosDao.php';
require_once '../model/Marca.php';
require_once '../model/Modelo.php';
require_once '../model/TipoVeiculo.php';
require_once '../model/TipoCombustivel.php';

header ("location:./atributos.php");



$cor = new Cor ();


$cor->setNome($_POST['cor']);


AtributosDao::cadastrarcor($cor);
//////////
$marca = new Marca ();


$marca->setNome($_POST['marca']);


AtributosDao::cadastrarmarca($marca);
///////
$modelo = new Modelo();


$modelo->setNome($_POST['modelo']);


AtributosDao::cadastrarmodelo($modelo);
/////////
$tipoVeiculo = new TipoVeiculo ();


$tipoVeiculo->setNome($_POST['tipo']);


AtributosDao::cadastrartipo($tipoVeiculo);
/////////
$tipoCombustivel = new TipoCombustivel ();


$tipoCombustivel->setNome($_POST['combustivel']);


AtributosDao::cadastrarcombustivel($tipoCombustivel);
?>