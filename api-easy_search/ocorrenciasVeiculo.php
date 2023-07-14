<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json; charset=utf-8');

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdAplicativo";

try {
    $conexao = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['placaVeiculo'])) {
        $placaVeiculo = $_GET['placaVeiculo'];

        $consulta = $conexao->prepare("SELECT o.idOcorrenciaVeiculo,
                                            o.descricaoOcorrenciaVeiculo,
                                            v.idVeiculo,v.placaVeiculo
                                        FROM tbOcorrenciaVeiculo o
                                        INNER JOIN tbVeiculo v ON v.idVeiculo = o.idVeiculo
                                        WHERE v.placaVeiculo = :placaVeiculo"
        );

        $consulta->bindValue(':placaVeiculo', $placaVeiculo, PDO::PARAM_STR);
        $consulta->execute();
        $ocorrencias = array();

        if ($consulta->rowCount() > 0) {
            while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $ocorrencia = array(
                    'idOcorrenciaVeiculo' => $exibe['idOcorrenciaVeiculo'],
                    'descricaoOcorrenciaVeiculo' => $exibe['descricaoOcorrenciaVeiculo'],
                    'idVeiculo'=>$exibe['idVeiculo'],
                    'placaVeiculo'=>$exibe['placaVeiculo'],
                );

                $ocorrencias[] = $ocorrencia;
            }

            echo json_encode($ocorrencias);
        } else {
            echo json_encode(array('error' => 'Nenhuma ocorrência encontrada para a placa informada.'));
        }
    } else {
        echo json_encode(array('error' => 'Parâmetro placaVeiculo não fornecido.'));
    }
} catch (PDOException $e) {
    echo json_encode(array('error' => 'Erro na conexão com o banco de dados: ' . $e->getMessage()));
}

?>
