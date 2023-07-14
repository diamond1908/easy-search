<?php

require_once("../model/Veiculo.php");
require_once '../dao/AtributosDao.php';
require_once '../model/Cidadao.php';
require_once '../model/TipoCombustivel.php';
require_once '../model/Cor.php';
require_once '../model/Modelo.php';
require_once '../model/Marca.php';
require_once '../model/TipoVeiculo.php';
require_once '../dao/VeiculoDao.php';

header ("location: ../secretaria/index.php");
$veiculo = new Veiculo();

$veiculo->setPlaca($_POST['placa']);
$veiculo->setTipoEixoVeiculo($_POST['eixo']);


$marca = new Marca();
$marca->setId($_POST['marca']);
$veiculo->setMarca($marca);

$modelo = new Modelo();
$modelo->setId($_POST['modelo']);
$veiculo->setModelo($modelo);

$cor = new Cor();
$cor->setId($_POST['cor']);
$veiculo->setCor($cor);

$tipo = new TipoVeiculo();
$tipo->setId($_POST['tipo']);
$veiculo->setTipoVeiculo($tipo);

$tipoCombustivel = new TipoCombustivel();
$tipoCombustivel->setId($_POST['combustivel']);
$veiculo->setTipoCombustivel($tipoCombustivel);

$cidadao = new Cidadao();
$cidadao->setId($_POST['cidadao']);
$veiculo->setCidadao($cidadao);

$veiculoDao = new VeiculoDao();
$veiculoDao->cadastrar($veiculo);

?>