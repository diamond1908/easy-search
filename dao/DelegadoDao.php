<?php
    require_once '../model/Delegado.php';
    require_once '../model/Conexao.php';

    class DelegadoDao{

        public static function cadastrar($delegado){
            $conexao = Conexao::conectar();

            $queryInsert = "INSERT INTO tbDelegado(nomeDelegado	,sobrenomeDelegado,cpfDelegado,generoDelegado,logradouroDelegado,	
            numLogDelegado,cepDelegado,complementoDelegado,bairroDelegado,cidadeDelegado,senhaDelegado,idSecretaria)
                            VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
             
            $prepareStatement = $conexao->prepare($queryInsert);
            
 
            $prepareStatement->bindValue(1, $delegado->getNome());
            $prepareStatement->bindValue(2, $delegado->getSobrenome());
            $prepareStatement->bindValue(3, $delegado->getCpf());
            $prepareStatement->bindValue(4, $delegado->getGenero());
            $prepareStatement->bindValue(5, $delegado->getLogradouro());
            $prepareStatement->bindValue(6, $delegado->getNumLog());
            $prepareStatement->bindValue(7, $delegado->getCep());
            $prepareStatement->bindValue(8, $delegado->getComplemento());
            $prepareStatement->bindValue(9, $delegado->getBairro());
            $prepareStatement->bindValue(10, $delegado->getCidade());
            $prepareStatement->bindValue(11, $delegado->getSenha());
            $prepareStatement->bindValue(12, $delegado->getSecretaria());


            $prepareStatement->execute();
            return 'Cadastrou';
        }

        public static function listardelegado(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT tbDelegado.idDelegado, tbDelegado.nomeDelegado, tbDelegado.sobrenomeDelegado, tbDelegado.cpfDelegado, tbDelegado.generoDelegado, tbDelegado.logradouroDelegado, tbDelegado.numLogDelegado, tbDelegado.cepDelegado, tbDelegado.complementoDelegado, tbDelegado.bairroDelegado, tbDelegado.cidadeDelegado, tbDelegado.senhaDelegado, tbDelegado.idSecretaria
            FROM tbDelegado
            INNER JOIN tbSecretaria ON tbDelegado.idSecretaria = tbSecretaria.idSecretaria
            ";
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

        public static function atualizarDelegado($idDelegado, $nome, $logradouro, $bairro, $cidade, $cpf, $cep) {
            // Conexão com o banco de dados (supondo que você já tenha essa implementação)
            $conexao = Conexao::conectar();

            // Consulta SQL para atualizar os dados da secretaria
            $sql = "UPDATE tbDelegado SET nomeDelegado = :nome, logradouroDelegado = :logradouro, bairroDelegado = :bairro, cidadeDelegado = :cidade, cpfDelegado = :cpf, cepDelegado  = :cep WHERE idDelegado = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $idDelegado);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':logradouro', $logradouro);
            $stmt->bindValue(':bairro', $bairro);
            $stmt->bindValue(':cidade', $cidade);
            $stmt->bindValue(':cpf', $cpf);
            $stmt->bindValue(':cep', $cep);
            $stmt->execute();
        }

        public static function excluirDelegado($idDelegado) {
            // Conexão com o banco de dados (supondo que você já tenha essa implementação)
            $conexao = Conexao::conectar();
        
            // Consulta SQL para excluir a secretaria
            $sql = "DELETE FROM tbdelegado WHERE idDelegado = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $idDelegado);
            $stmt->execute();
        }


    }
?>