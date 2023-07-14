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

    // Verificar se o parâmetro idOcorrencia foi fornecido
    if (isset($_GET['idOcorrencia'])) {
        $idOcorrencia = $_GET['idOcorrencia'];

        // Consultar as pessoas relacionadas à ocorrência especificada
        $consulta = $conexao->prepare("SELECT d.iddeclarante,
                                        c.idCidadao, c.cpfCidadao, c.nomeCidadao, c.sobrenomeCidadao,
                                        o.idOcorrencia
                                    FROM tbdeclarante d
                                    INNER JOIN tbCidadao c ON d.idCidadao = c.idCidadao
                                    INNER JOIN tbOcorrencia o ON d.idOCorrencia = o.idOcorrencia
                                    WHERE o.idOcorrencia = :idOcorrencia");

        $consulta->bindParam(':idOcorrencia', $idOcorrencia, PDO::PARAM_INT);
        $consulta->execute();

        $resposta = array();

        if ($consulta->rowCount() == 0) {
            $resposta['Resp'] = '0';
        } else {
            while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $resposta[] = array(
                    'iddeclarante' => $exibe['iddeclarante'],
                    'idOcorrencia' => $exibe['idOcorrencia'],
                    'idCidadao' => $exibe['idCidadao'],
                    'cpfCidadao' => $exibe['cpfCidadao'],
                    'nomeCidadao' => $exibe['nomeCidadao'],
                    'sobrenomeCidadao' => $exibe['sobrenomeCidadao'],
                );
            }
        }

        echo json_encode($resposta);
    } else {
        echo json_encode(array('error' => 'Parâmetro idOcorrencia não fornecido.'));
    }
} catch (PDOException $e) {
    echo json_encode(array('error' => 'Erro na conexão com o banco de dados: ' . $e->getMessage()));
}
?>
