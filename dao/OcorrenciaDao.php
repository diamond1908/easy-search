<?php
require_once '../model/Ocorrencia.php';
require_once '../model/Conexao.php';

class OcorrenciaDao{
    public static function cadastrar($ocorrencia){
        $conexao = Conexao::conectar();

        $queryInsert = "INSERT INTO tbOcorrencia(descricaoOcorrencia, dataOcorrencia, objetosOcorrencia, cepOcorrencia,
        horaOcorrencia, relatoOcorrencia, idCidadao, idTipoOcorrencia)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $prepareStatement = $conexao->prepare($queryInsert);

        $prepareStatement->bindValue(1, $ocorrencia->getDesc());
        $prepareStatement->bindValue(2, $ocorrencia->getData());
        $prepareStatement->bindValue(3, $ocorrencia->getObjetos());
        $prepareStatement->bindValue(4, $ocorrencia->getCep());
        $prepareStatement->bindValue(5, $ocorrencia->getHora());
        $prepareStatement->bindValue(6, $ocorrencia->getRelato());
        $prepareStatement->bindValue(7, $ocorrencia->getCidadao());
        $prepareStatement->bindValue(8, $ocorrencia->getTipo());

        $prepareStatement->execute();

        // Atualizar o campo idSituacao na tabela tbCidadao
        $idCidadao = $ocorrencia->getCidadao();
        $queryUpdate = "UPDATE tbCidadao SET idSituacao = 1 WHERE idCidadao = ?";
        $prepareStatementUpdate = $conexao->prepare($queryUpdate);
        $prepareStatementUpdate->bindValue(1, $idCidadao);
        $prepareStatementUpdate->execute();

        return 'Cadastrou';
    }

    public static function listarocorrencia(){
        $conexao = Conexao::conectar();
        $querySelect = "SELECT descricaoOcorrencia, dataOcorrencia, objetosOcorrencia, cepOcorrencia,
        horaOcorrencia, relatoOcorrencia, idCidadao, idTipoOcorrencia FROM tbOcorrencia
        INNER JOIN tbCidadao ON tbocorrencia.idCidadao = tbCidadao.idCidadao";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
}
?>
