<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json; charset=utf-8');
header('Content-Type: application/json');

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdAplicativo";

try {
    $conexao = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar se o parâmetro placa foi fornecido
    file_put_contents('log.txt', $_POST['placa']);
    if (isset($_POST['placa'])) {
        $placa = $_POST['placa'];

        // Consultar o ID do veículo com base na placa
        $consultaVeiculo = $conexao->prepare("SELECT idVeiculo FROM tbVeiculo WHERE placaVeiculo = :placa");
        $consultaVeiculo->bindParam(':placa', $placa, PDO::PARAM_STR);
        $consultaVeiculo->execute();

        $veiculo = $consultaVeiculo->fetch(PDO::FETCH_ASSOC);
        $idVeiculo = $veiculo['idVeiculo'];

        // Consultar as ocorrências relacionadas ao ID do veículo
        $consultaOcorrencias = $conexao->prepare("SELECT o.idOcorrencia, o.descricaoOcorrencia, v.idVeiculo, v.placaVeiculo
                                                 FROM tbOcorrencia o
                                                 INNER JOIN tbveiculosenvolvidos ov ON o.idOcorrencia = ov.idOcorrencia
                                                 INNER JOIN tbVeiculo v ON ov.idVeiculo = v.idVeiculo
                                                 WHERE v.idVeiculo = :idVeiculo");

        $consultaOcorrencias->bindParam(':idVeiculo', $idVeiculo, PDO::PARAM_INT);
        $consultaOcorrencias->execute();

        $resposta = array();

        while ($exibe = $consultaOcorrencias->fetch(PDO::FETCH_ASSOC)) {
            $resposta[] = array(
                'idOcorrencia' => $exibe['idOcorrencia'],
                'descricaoOcorrencia' => $exibe['descricaoOcorrencia'],
                'idVeiculo' => $exibe['idVeiculo'],
                'placaVeiculo' => $exibe['placaVeiculo'],
            );
        }

        echo json_encode($resposta);
    } else {
        echo json_encode(array('error' => 'Parâmetro placa não fornecido.'));
    }
} catch (PDOException $e) {
    echo json_encode(array('error' => 'Erro na conexão com o banco de dados: ' . $e->getMessage()));
}
?>
