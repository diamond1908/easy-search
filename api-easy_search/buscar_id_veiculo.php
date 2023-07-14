<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Content-Type: application/json; charset=utf-8');
header('Content-Type: application/json');

// Verificar se o parâmetro placaVeiculo foi fornecido
if (isset($_POST['placa'])) {
    $placa = $_POST['placa'];

    // Realizar uma requisição POST para consultar_ocorrencias.php, enviando a placa como parâmetro
    $url = 'http://localhost:8080/api-easy_search/buscar_id_veiculo.php'; // Altere a URL conforme o nome do arquivo
    $data = array('placa' => $placa);

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        ),
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    // Exibir o resultado da consulta de ocorrências
    echo $result;
} else {
    echo json_encode(array('error' => 'Parâmetro placa não fornecido.'));
}
?>
