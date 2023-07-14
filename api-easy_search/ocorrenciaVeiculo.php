<?php

header('Access-Control-Allow-Headers: Content-Type');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: X-Requested-With');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-Type: application/json; charset=utf-8');

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdAplicativo";

try {
    $conexao = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['idOcorrenciaVeiculo'])) {
        $idOcorrencia = $_GET['idOcorrenciaVeiculo'];

        $consulta = $conexao->prepare("SELECT o.idOcorrenciaVeiculo,
                                            o.descricaoOcorrenciaVeiculo,
                                            o.dataOcorrenciaVeiculo,
                                            o.objetosOcorrenciaVeiculo,
                                            o.cepOcorrenciaVeiculo,
                                            o.horaOcorrenciaVeiculo,
                                            o.relatoOcorrenciaVeiculo,
                                            v.idVeiculo, v.placaVeiculo,
                                            ot.idTipoOcorrencia, ot.nomeOcorrencia
                                        FROM tbOcorrenciaVeiculo o
                                        INNER JOIN tbVeiculo v ON o.idVeiculo = v.idVeiculo
                                        INNER JOIN tbTipoOcorrencia ot ON o.idTipoOcorrencia = ot.idTipoOcorrencia
                                        WHERE o.idOcorrenciaVeiculo = :idOcorrenciaVeiculo
                                        "
        );

        $consulta->bindParam(':idOcorrenciaVeiculo', $idOcorrencia, PDO::PARAM_INT);
        $consulta->execute();

        $ocorrencias = array();

        if ($consulta->rowCount() > 0) {
            while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $ocorrencia = array(
                    'idOcorrenciaVeiculo' => $exibe['idOcorrenciaVeiculo'],
                    'descricaoOcorrenciaVeiculo' => $exibe['descricaoOcorrenciaVeiculo'],
                    'dataOcorrenciaVeiculo' => $exibe['dataOcorrenciaVeiculo'],
                    'objetosOcorrenciaVeiculo' => $exibe['objetosOcorrenciaVeiculo'],
                    'cepOcorrenciaVeiculo' => $exibe['cepOcorrenciaVeiculo'],
                    'horaOcorrenciaVeiculo' => $exibe['horaOcorrenciaVeiculo'],
                    'relatoOcorrenciaVeiculo' => $exibe['relatoOcorrenciaVeiculo'],
                    'placaVeiculo' => $exibe['placaVeiculo'],
                    'nomeOcorrencia' => $exibe['nomeOcorrencia'],
                );

                $ocorrencias[] = $ocorrencia;
            }

            echo json_encode($ocorrencias);
        } else {
            echo json_encode(array('error' => 'Nenhuma ocorrência encontrada para o ID informado.'));
        }
    } else {
        echo json_encode(array('error' => 'Parâmetro idOcorrencia não fornecido.'));
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(array('error' => 'Erro na conexão com o banco de dados: ' . $e->getMessage()));
    exit;
}
?>