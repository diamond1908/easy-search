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

    // Verificar se foi fornecido o ID da ocorrência
    if (!isset($_GET['idOcorrencia'])) {
        echo json_encode(['error' => 'ID da ocorrência não fornecido']);
        exit;
    }

    $idOcorrencia = $_GET['idOcorrencia'];

    // Consultar a descrição da ocorrência com base no ID fornecido
    $consulta = $conexao->prepare("SELECT descricaoOcorrencia FROM tbOcorrencia WHERE idOcorrencia = :id");
    $consulta->bindParam(':id', $idOcorrencia, PDO::PARAM_INT);
    $consulta->execute();

    $resposta = [];

    if ($consulta->rowCount() == 0) {
        $resposta['error'] = 'Nenhuma ocorrência encontrada com o ID especificado';
    } else {
        $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
        $resposta['descricaoOcorrencia'] = $exibe['descricaoOcorrencia'];
    }

    echo json_encode($resposta);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro na conexão com o banco de dados: ' . $e->getMessage()]);
}
?>
