<?php

echo('tudo certo por aqui');

header('Content-type: application/json');
header('Access-Control-Allow-Headers: "Origin, X-Requested-With, Content-Type, Accept"');
header("Access-Control-Allow-Origin: *");

// include './conexao.php';

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdAplicativo";

$conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);
$cpf = $data['cpf'];

// Fazer o SELECT da tabela cidadão
$consulta = $conexao->query("SELECT * FROM tbCidadao");

if ($consulta->rowCount()==0) {
    $resposta = array('Resp'=> '0');
}else{
    while($exibe=$consulta->fetch(PDO::FETCH_ASSOC)){
        $resposta [] = array (
        'id' => $exibe['id'],
        'nomeCidadao' => $exibe['nomeCidadao'],
        'sobrenomeCidadao' => $exibe['sobrenomeCidadao'],
        'emailCidadao' => $exibe['emailCidadao'],
        'cpfCidadao' => $exibe['cpfCidadao'],
        'generoCidadao' => $exibe['generoCidadao'],
        'DataNascCidadao' => $exibe['DataNascCidadao'],
        'logradouroCidadao' => $exibe['logradouroCidadao'],
        'numLogCidadao' => $exibe['numLogCidadao'],
        'cepCidadao' => $exibe['cepCidadao'],
        'complementoCidadao' => $exibe['complementoCidadao'],
        'bairroCidadao' => $exibe['bairroCidadao'],
        'cidadeCidadao' => $exibe['cidadeCidadao'],   
        'idSituacao' => $exibe['idSituacao'],
        );
    }
}

ob_clean();
echo json_encode($resposta);

?>