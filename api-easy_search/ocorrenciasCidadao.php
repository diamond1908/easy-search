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

    if (isset($_GET['cpfCidadao'])) {
        $cpfCidadao = $_GET['cpfCidadao'];

        $consulta = $conexao->prepare("SELECT o.idOcorrencia,
                                            o.descricaoOcorrencia,
                                            cd.idCidadao
                                        FROM tbOcorrencia o
                                        INNER JOIN tbCidadao cd ON o.idCidadao = cd.idCidadao
                                        WHERE cd.cpfCidadao = :cpfCidadao"
        );

        $consulta->bindParam(':cpfCidadao', $cpfCidadao, PDO::PARAM_STR);
        $consulta->execute();

        $ocorrencias = array();

        if ($consulta->rowCount() > 0) {
            while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $ocorrencia = array(
                    'idOcorrencia' => $exibe['idOcorrencia'],
                    'descricaoOcorrencia' => $exibe['descricaoOcorrencia'],
                );

                $ocorrencias[] = $ocorrencia;
            }

            echo json_encode($ocorrencias);
        } else {
            echo json_encode(array('error' => 'Nenhuma ocorrência encontrada para o CPF informado.'));
        }
    } else {
        echo json_encode(array('error' => 'Parâmetro cpfCidadao não fornecido.'));
    }
} catch (PDOException $e) {
    echo json_encode(array('error' => 'Erro na conexão com o banco de dados: ' . $e->getMessage()));
}
?>
