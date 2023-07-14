<?php
    require_once '../model/Envolvidos.php';
    require_once '../model/Conexao.php';

    class EnvolvidosDao{

        public static function cadastrar($Envolvidos){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbEnvolvidos(idCidadao, idOcorrencia)
            VALUES (?,?)";
             
            $prepareStatement = $conexao->prepare($queryInsert);
            
 

            $prepareStatement->bindValue(1, $Envolvidos->getCidadao()->getId());
            $prepareStatement->bindValue(2, $Envolvidos->getOcorrencia()->getId());



            $prepareStatement->execute();
            return 'Cadastrou';
        }

        public static function listarEnvolvidos(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT 	idEnvolvidos,idCidadao,idOcorrencia	 FROM tbEnvolvidos
            INNER JOIN tbCidadao ON tbEnvolvidos.idCidadao = tbCidadao.idCidadao
            INNER JOIN tbOcorrencia ON tbEnvolvidos.idOcorrencia = tbOcorrencia.idOcorrencia
            ";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }


    }
?>