<?php
// Arquivo: verificarCPF.php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With'); 
header('Content-Type: application/json; charset=utf-8, text/plain ');  

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdAplicativo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter o CPF enviado pelo React Native
$data = json_decode(file_get_contents('php://input'), true);
$cpf = $data['cpf'];

// Consultar o banco de dados para verificar se o CPF existe
$sql = "SELECT COUNT(*) as count FROM tbCidadao WHERE cpfCidadao = '$cpf'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


// Verificar se o CPF existe
$exists = ($row['count'] > 0);

// Retornar a resposta como JSON
header('Content-Type: application/json');
echo json_encode(array('exists' => $exists));

// Fechar a conexão com o banco de dados
$conn->close();
?>
