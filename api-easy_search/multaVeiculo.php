<?php
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

    // Consultar as multas do veículo especificado
    $consulta = $conexao->prepare("SELECT m.idMulta, m.motivoMulta, m.valorMulta, m.horaMulta, m.dataMulta, m.cepMulta, m.logradouroMulta, m.bairroMulta, m.cidadeMulta,
                                    v.idVeiculo, v.placaVeiculo
                                FROM tbMulta m
                                INNER JOIN tbVeiculo v ON m.idVeiculo = v.idVeiculo
                                WHERE v.idVeiculo ");

    // $consulta->bindParam(':placa', $placa, PDO::PARAM_STR);
    $consulta->execute();

    $resposta = array();

    if ($consulta->rowCount() == 0) {
        $resposta['Resp'] = '0';
    } else {
        while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $resposta[] = array(
                'idMulta' => $exibe['idMulta'],
                'motivoMulta' => $exibe['motivoMulta'],
                'valorMulta' => $exibe['valorMulta'],
                'horaMulta' => $exibe['horaMulta'],
                'dataMulta' => $exibe['dataMulta'],
                'cepMulta' => $exibe['cepMulta'],
                'logradouroMulta' => $exibe['logradouroMulta'],
                'bairroMulta' => $exibe['bairroMulta'],
                'cidadeMulta' => $exibe['cidadeMulta'], 
                'placaVeiculo' => $exibe['placaVeiculo'],
                'idVeiculo' => $exibe['idVeiculo'],
            );
        }
    }

    echo json_encode($resposta);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
