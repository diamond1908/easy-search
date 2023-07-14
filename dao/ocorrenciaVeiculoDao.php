<?php
    require_once '../model/Ocorrencia.php';
    require_once '../model/Conexao.php';

    class ocorrenciaVeiculoDao{

        public static function cadastrar($ocorrenciaVeiculo){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbOcorrenciaVeiculo(descricaoOcorrenciaVeiculo, dataOcorrenciaVeiculo, objetosOcorrenciaVeiculo, cepOcorrenciaVeiculo,
            horaOcorrenciaVeiculo, relatoOcorrenciaVeiculo, idVeiculo, idTipoOcorrencia)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
             
            $prepareStatement = $conexao->prepare($queryInsert);
            
 
            $prepareStatement->bindValue(1, $ocorrenciaVeiculo->getDesc());
            $prepareStatement->bindValue(2, $ocorrenciaVeiculo->getData());
            $prepareStatement->bindValue(3, $ocorrenciaVeiculo->getObjetos());
            $prepareStatement->bindValue(4, $ocorrenciaVeiculo->getHora());
            $prepareStatement->bindValue(5, $ocorrenciaVeiculo->getRelato());
            $prepareStatement->bindValue(6, $ocorrenciaVeiculo->getCep());
            $prepareStatement->bindValue(7, $ocorrenciaVeiculo->getVeiculo());
            $prepareStatement->bindValue(8, $ocorrenciaVeiculo->getTipo());



            $prepareStatement->execute();
            return 'Cadastrou';
        }

        public static function listarocorrenciaveiculo(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT descricaoOcorrenciaVeiculo, dataOcorrenciaVeiculo, objetosOcorrenciaVeiculo, cepOcorrenciaVeiculo,
            horaOcorrenciaVeiculo, relatoOcorrenciaVeiculo, idVeiculo, idTipoOcorrencia FROM tbOcorrenciaVeiculo
            INNER JOIN tbVeiculo ON tbocorrenciaveiculo.idVeiculo = tbVeiculo.idVeiculo
            ";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }


    }
?>