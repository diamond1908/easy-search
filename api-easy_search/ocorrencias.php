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

    if (isset($_GET['idOcorrencia'])) {
        $idOcorrencia = $_GET['idOcorrencia'];

        $consulta = $conexao->prepare("SELECT o.idOcorrencia,
                                            o.descricaoOcorrencia,
                                            o.dataOcorrencia,
                                            o.objetosOcorrencia,
                                            o.cepOcorrencia,
                                            o.horaOcorrencia,
                                            o.relatoOcorrencia,
                                            cd.idCidadao, cd.nomeCidadao, cd.sobrenomeCidadao, cd.cpfCidadao,
                                            ot.idTipoOcorrencia, ot.nomeOcorrencia
                                        FROM tbOcorrencia o
                                        INNER JOIN tbCidadao cd ON o.idCidadao = cd.idCidadao
                                        INNER JOIN tbTipoOcorrencia ot ON o.idTipoOcorrencia = ot.idTipoOcorrencia
                                        WHERE o.idOcorrencia = :idOcorrencia
                                        "
        );

        $consulta->bindParam(':idOcorrencia', $idOcorrencia, PDO::PARAM_INT);
        $consulta->execute();

        $ocorrencias = array();

        if ($consulta->rowCount() > 0) {
            while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $ocorrencia = array(
                    'idOcorrencia' => $exibe['idOcorrencia'],
                    'descricaoOcorrencia' => $exibe['descricaoOcorrencia'],
                    'dataOcorrencia' => $exibe['dataOcorrencia'],
                    'objetosOcorrencia' => $exibe['objetosOcorrencia'],
                    'cepOcorrencia' => $exibe['cepOcorrencia'],
                    'horaOcorrencia' => $exibe['horaOcorrencia'],
                    'relatoOcorrencia' => $exibe['relatoOcorrencia'],
                    'nomeCidadao' => $exibe['nomeCidadao'],
                    'sobrenomeCidadao' => $exibe['sobrenomeCidadao'],
                    'cpfCidadao' => $exibe['cpfCidadao'],
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