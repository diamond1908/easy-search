<?php
header('Content-type: application/json');
header('Access-Control-Allow-Headers: "Origin, X-Requested-With, Content-Type, Accept"');
header('Access-Control-Allow-Origin: *');

// include './conexao.php';

// Conexão com o banco de dados
$servername = "localhost";
$host = "localhost";
$username = "root";
$password = "";
$dbname = "bdAplicativo";

$conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

try {
    $consulta = $conexao->query("SELECT v.idVeiculo, v.placaVeiculo, v.tipoEixoVeiculo,
                                    mv.idModeloVeiculo, mv.nomeModeloVeiculo,
                                    m.idMarca, m.nomeMarca,
                                    c.idCor, c.nomeCor,
                                    tc.idTipoCombustivel, tc.TipoCombustivel,
                                    tv.idTipoVeiculo, tv.nomeTipoVeiculo,
                                    cd.idCidadao, cd.nomeCidadao, cd.sobrenomeCidadao, cd.cpfCidadao
                                FROM tbVeiculo v
                                INNER JOIN tbModeloVeiculo mv ON v.idModeloVeiculo = mv.idModeloVeiculo
                                INNER JOIN tbMarca m ON v.idMarca = m.idMarca
                                INNER JOIN tbCor c ON v.idCor = c.idCor
                                INNER JOIN tbTipoCombustivel tc ON v.idTipoCombustivel = tc.idTipoCombustivel
                                INNER JOIN tbTipoVeiculo tv ON v.idTipoVeiculo = tv.idTipoVeiculo
                                INNER JOIN tbCidadao cd ON v.idCidadao = cd.idCidadao");

    if ($consulta === false) {
        die(json_encode(['error' => 'Erro na consulta: ' . $conexao->errorInfo()[2]]));
    }

    $resposta = [];

    while ($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $resposta[] = [
            'id' => $exibe['idVeiculo'],
            'placaVeiculo' => $exibe['placaVeiculo'],
            'tipoEixoVeiculo' => $exibe['tipoEixoVeiculo'],
            'nomeModeloVeiculo' => $exibe['nomeModeloVeiculo'],
            'nomeMarca' => $exibe['nomeMarca'],
            'nomeCor' => $exibe['nomeCor'],
            'TipoCombustivel' => $exibe['TipoCombustivel'],
            'nomeTipoVeiculo' => $exibe['nomeTipoVeiculo'],
            'nomeCidadao' => $exibe['nomeCidadao'],
            'sobrenomeCidadao' => $exibe['sobrenomeCidadao'],
            'cpfCidadao' => $exibe['cpfCidadao'],
        ];
    }

    echo json_encode($resposta);
} catch (PDOException $e) {
    die(json_encode(['error' => 'Erro na conexão com o banco de dados: ' . $e->getMessage()]));
}
?>
