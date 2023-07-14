<?php
    require_once '../model/Cidadao.php';
    require_once '../model/Conexao.php';

    class CidadaoDao{

        public static function cadastrar($cidadao){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbCidadao(nomeCidadao,sobrenomeCidadao,cpfCidadao,generoCidadao,logradouroCidadao,	
            numLogCidadao,cepCidadao,complementoCidadao,bairroCidadao,cidadeCidadao,DataNascCidadao,emailCidadao,idSituacao)
                            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,2)";
        
            $prepareStatement = $conexao->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $cidadao->getNome());
            $prepareStatement->bindValue(2, $cidadao->getSobrenome());
            $prepareStatement->bindValue(3, $cidadao->getCpf());
            $prepareStatement->bindValue(4, $cidadao->getGenero());
            $prepareStatement->bindValue(5, $cidadao->getLogradouro());
            $prepareStatement->bindValue(6, $cidadao->getNumLog());
            $prepareStatement->bindValue(7, $cidadao->getCep());
            $prepareStatement->bindValue(8, $cidadao->getComplemento());
            $prepareStatement->bindValue(9, $cidadao->getBairro());
            $prepareStatement->bindValue(10, $cidadao->getCidade());
            $prepareStatement->bindValue(11, $cidadao->getIdade());
            $prepareStatement->bindValue(12, $cidadao->getEmail());
            // $prepareStatement->bindValue(13, $cidadao->getSituacao());
            


            $prepareStatement->execute();
            return 'Cadastrou';
        }

        public static function listarcidadao(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idCidadao, nomeCidadao,sobrenomeCidadao,cpfCidadao,generoCidadao,logradouroCidadao,	
            numLogCidadao,cepCidadao,complementoCidadao,bairroCidadao,cidadeCidadao,emailCidadao,DataNascCidadao FROM tbCidadao";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }

        public static function listar(){
            $conexao = Conexao::conectar();
            $queryInsert = "INSERT INTO tbSituacao(nomeCidadao)
                            VALUES(?)";
            $querySelect = "SELECT idSituacao, nomeSituacao, FROM tbSituacao";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }



        public static function buscarDelegadoPorId($idDelegado) {
            // Conexão com o banco de dados (supondo que você já tenha essa implementação)
            $conexao = Conexao::conectar();

            // Consulta SQL para buscar a secretaria pelo ID
            $sql = "SELECT * FROM tbdelegado WHERE idDelegado = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $idDelegado);
            $stmt->execute();

            // Verifica se a secretaria foi encontrada
            if ($stmt->rowCount() > 0) {
                // Retorna os dados da secretaria encontrada
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                throw new Exception("Delegado não encontrado");
            }
        }

        public static function atualizarCidadao($idCidadao, $nome, $logradouro, $bairro, $cidade, $cpf, $cep) {
            // Conexão com o banco de dados (supondo que você já tenha essa implementação)
            $conexao = Conexao::conectar();

            // Consulta SQL para atualizar os dados da secretaria
            $sql = "UPDATE tbCidadao SET nomeCidadao = :nome, logradouroCidadao = :logradouro, bairroCidadao = :bairro, cidadeCidadao = :cidade, cpfCidadao = :cpf, cepCidadao  = :cep WHERE idCidadao = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $idCidadao);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':logradouro', $logradouro);
            $stmt->bindValue(':bairro', $bairro);
            $stmt->bindValue(':cidade', $cidade);
            $stmt->bindValue(':cpf', $cpf);
            $stmt->bindValue(':cep', $cep);
            $stmt->execute();
        }

        public static function excluirCidadao($idCidadao) {
            // Conexão com o banco de dados (supondo que você já tenha essa implementação)
            $conexao = Conexao::conectar();
        
            // Consulta SQL para excluir a secretaria
            $sql = "DELETE FROM tbcidadao WHERE idCidadao = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $idCidadao);
            $stmt->execute();
        }
    }
?>