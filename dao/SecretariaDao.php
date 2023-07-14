<?php
    require_once '../model/Secretaria.php';
    require_once '../model/Conexao.php';

    class SecretariaDao{

        public static function cadastrar($secretaria){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbSecretaria(senhaSecretaria,emailSecretaria,logradouroSecretaria,
            numLogSecretaria,cepSecretaria,bairroSecretaria, cidadeSecretaria)
                            VALUES(?,?,?,?,?,?,?)";
            
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $secretaria->getSenha());
            $prepareStatement->bindValue(2, $secretaria->getEmail());
            $prepareStatement->bindValue(3, $secretaria->getLogradouro());
            $prepareStatement->bindValue(4, $secretaria->getNumLog());
            $prepareStatement->bindValue(5, $secretaria->getCep());
            $prepareStatement->bindValue(6, $secretaria->getBairro());
            $prepareStatement->bindValue(7, $secretaria->getCidade());
          
            


            $prepareStatement->execute();
            return 'Cadastrou';
        }

        public static function listarSecretaria(){                        
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idSecretaria, senhaSecretaria, emailSecretaria, logradouroSecretaria, cepSecretaria, bairroSecretaria , cidadeSecretaria  FROM tbSecretaria";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }

        // SecretariaDao.php

// ...

        public static function buscarSecretariaPorId($idSecretaria) {
            // Conexão com o banco de dados (supondo que você já tenha essa implementação)
            $conexao = Conexao::conectar();

            // Consulta SQL para buscar a secretaria pelo ID
            $sql = "SELECT * FROM tbsecretaria WHERE idSecretaria = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $idSecretaria);
            $stmt->execute();

            // Verifica se a secretaria foi encontrada
            if ($stmt->rowCount() > 0) {
                // Retorna os dados da secretaria encontrada
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                throw new Exception("Secretaria não encontrada");
            }
        }

        // SecretariaDao.php

// ...

        public static function atualizarSecretaria($idSecretaria, $email, $cep, $cidade) {
            // Conexão com o banco de dados (supondo que você já tenha essa implementação)
            $conexao = Conexao::conectar();

            // Consulta SQL para atualizar os dados da secretaria
            $sql = "UPDATE tbsecretaria SET emailSecretaria = :email, cepSecretaria = :cep, cidadeSecretaria = :cidade WHERE idSecretaria = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $idSecretaria);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':cep', $cep);
            $stmt->bindValue(':cidade', $cidade);
            $stmt->execute();
        }

        public static function excluirSecretaria($idSecretaria) {
            // Conexão com o banco de dados (supondo que você já tenha essa implementação)
            $conexao = Conexao::conectar();
        
            // Consulta SQL para excluir a secretaria
            $sql = "DELETE FROM tbsecretaria WHERE idSecretaria = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $idSecretaria);
            $stmt->execute();
        }

// ...


// ...

    }
    
?>