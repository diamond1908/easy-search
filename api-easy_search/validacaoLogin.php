<?php

header("Access-Control-Allow-Origin: http://localhost:19006");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Verificar se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obter os dados enviados no corpo da requisição
  $requestData = json_decode(file_get_contents('php://input'), true);

  // Extrair o CPF e senha do objeto de dados
  $cpf = $requestData['cpf'];
  $senha = $requestData['senha'];

  // Configurar as informações de conexão com o banco de dados
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bdAplicativo";

  // Criar uma nova conexão PDO
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  // Preparar e executar a consulta SQL para verificar as credenciais
  $stmt = $conn->prepare("SELECT * FROM tbPolicial WHERE cpfPolicial = :cpfPolicial AND senhaPolicial = :senhaPolicial");
  $stmt->bindParam(':cpfPolicial', $cpf);
  $stmt->bindParam(':senhaPolicial', $senha);
  $stmt->execute();

  // Verificar se a consulta retornou algum resultado
  if ($stmt->rowCount() > 0) {
    // Credenciais válidas
    $response = array('valid' => true);
  } else {
    // Credenciais inválidas
    $response = array('valid' => false);
  }

  // Configurar o cabeçalho da resposta como JSON
  header('Content-Type: application/json');

  // Retornar a resposta como JSON
  echo json_encode($response);
}
?>
