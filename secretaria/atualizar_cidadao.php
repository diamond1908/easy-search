<?php
require_once '../dao/CidadaoDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idCidadao = $_POST['id'];
    $nome = $_POST['nome'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $cpf = $_POST['cpf'];
    $cep = $_POST['cep'];

    try {
        // Realize as validações necessárias nos dados recebidos

        // Execute a operação de atualização no banco de dados
        CidadaoDao::atualizarCidadao($idCidadao, $nome, $logradouro, $bairro, $cidade, $cpf, $cep);

        // Redirecione de volta para o arquivo index.php
        header('Location: index.php');
        exit(); // Certifique-se de adicionar a chamada exit() após o redirecionamento
    } catch (Exception $e) {
        echo 'Erro ao atualizar as Informações do Delegado: ' . $e->getMessage();
    }
}
?>