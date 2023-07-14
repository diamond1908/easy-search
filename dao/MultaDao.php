<?php
    require_once '../model/Multa.php';
    require_once '../model/Conexao.php';

    class MultaDao{

        public static function cadastrar($Multa){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbMulta(motivoMulta, valorMulta, horaMulta, dataMulta, cepMulta, logradouroMulta, bairroMulta, cidadeMulta, idVeiculo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
             
            $prepareStatement = $conexao->prepare($queryInsert);
            
 
            $prepareStatement->bindValue(1, $Multa->getMotivo());
            $prepareStatement->bindValue(2, $Multa->getValor());
            $prepareStatement->bindValue(3, $Multa->getHora());
            $prepareStatement->bindValue(4, $Multa->getData());
            $prepareStatement->bindValue(5, $Multa->getCep());
            $prepareStatement->bindValue(6, $Multa->getLog());
            $prepareStatement->bindValue(7, $Multa->getBairro());
            $prepareStatement->bindValue(8, $Multa->getCidade());
            $prepareStatement->bindValue(9, $Multa->getVeiculo()->getId());
            



            $prepareStatement->execute();
            return 'Cadastrou';
        }

        public static function listarMulta(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT motivoMulta,valorMulta,horaMulta,dataMulta,cepMulta,logradouroMulta,bairroMulta,cidadeMulta,idVeiculo, idVeiculo FROM tbMulta
            INNER JOIN tbVeiculo ON tbMulta.idVeiculo = tbVeiculo.idVeiculo
            ";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }


    }
?>