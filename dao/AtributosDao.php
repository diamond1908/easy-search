<?php
    require_once("../model/Cor.php");
    require_once '../model/Conexao.php';
    require_once '../model/Marca.php';
    require_once '../model/Modelo.php';
    require_once '../model/TipoCombustivel.php';
    require_once '../model/TipoVeiculo.php';

    class AtributosDao{
//////////////////////////REGISTRAR////////////////////////////////
//cor/
        public static function cadastrarcor($cor){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbCor( nomeCor )
                            VALUES(?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $cor->getNome());


            $prepareStatement->execute();
            return 'Cadastrou';
        }
        //modelo/
        public static function cadastrarmodelo($modelo){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbModeloVeiculo( nomeModeloVeiculo )
                            VALUES(?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $modelo->getNome());


            $prepareStatement->execute();
            return 'Cadastrou';
        }
        //marca/
        public static function cadastrarmarca($marca){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbMarca( nomeMarca )
                            VALUES(?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $marca->getNome());


            $prepareStatement->execute();
            return 'Cadastrou';
        }
        //tipo veiculo/
        public static function cadastrartipo($tipoVeiculo){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbTipoVeiculo( nomeTipoVeiculo )
                            VALUES(?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $tipoVeiculo->getNome());


            $prepareStatement->execute();
            return 'Cadastrou';
        }
        //tipo combustivel/
        public static function cadastrarcombustivel($tipoCombustivel){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbTipoCombustivel( TipoCombustivel )
                            VALUES(?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $tipoCombustivel->getNome());


            $prepareStatement->execute();
            return 'Cadastrou';
        }











////////////////////////////LISTAR//////////////////////////////////////
        //cor/
        public static function listarcor(){                        
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idCor, nomeCor  FROM tbCor";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }
        //modelo/
        public static function listarmodelo(){                        
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idModeloVeiculo, nomeModeloVeiculo  FROM tbModeloVeiculo";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }
        //marca/
        public static function listarmarca(){                        
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idMarca, nomeMarca  FROM tbMarca";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }
        //tipo veiculo/
        public static function listartipo(){                        
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idTipoVeiculo, nomeTipoVeiculo  FROM tbTipoVeiculo";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }
        //tipo combustivel/
        public static function listarcombustivel(){                        
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idTipoCombustivel,TipoCombustivel   FROM tbTipoCombustivel";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }
    }
?>