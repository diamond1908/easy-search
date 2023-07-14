<?php
    require_once '../model/Policial.php';
    require_once '../model/Conexao.php';

    class PolicialDao{

        public static function cadastrar($policial){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbPolicial(nomePolicial	,sobrenomePolicial,cpfPolicial,generoPolicial,
            logradouroPolicial,	
            numLogPolicial,cepPolicial,complementoPolicial,bairroPolicial,cidadePolicial,senhaPolicial,
            DataNascPolicial,matriculaPolicia)
                            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
           

            $prepareStatement->bindValue(1, $policial->getNome());
            $prepareStatement->bindValue(2, $policial->getSobrenome());
            $prepareStatement->bindValue(3, $policial->getCpf());
            $prepareStatement->bindValue(4, $policial->getGenero());
            $prepareStatement->bindValue(5, $policial->getLogradouro());
            $prepareStatement->bindValue(6, $policial->getNumLog());
            $prepareStatement->bindValue(7, $policial->getCep());
            $prepareStatement->bindValue(8, $policial->getComplemento());
            $prepareStatement->bindValue(9, $policial->getBairro());
            $prepareStatement->bindValue(10, $policial->getCidade());
            $prepareStatement->bindValue(11, $policial->getSenha());
            $prepareStatement->bindValue(12, $policial->getIdade());
            $prepareStatement->bindValue(13, $policial->getMatricula());


            $prepareStatement->execute();
            return 'Cadastrou';
        }

        public static function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idPolicial, nomePolicial	,sobrenomePolicial,cpfPolicial,generoPolicial,logradouroPolicial,	
            numLogPolicial,cepPolicial,complementoPolicial,bairroPolicial,cidadePolicial,senhaPolicial,DataNascPolicial,matriculaPolicia FROM tbPolicial";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }
    }
?>