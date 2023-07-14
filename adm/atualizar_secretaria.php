<?php
require_once '../dao/SecretariaDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idSecretaria = $_POST['id'];
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];

    try {
        // Realize as validações necessárias nos dados recebidos

        // Execute a operação de atualização no banco de dados
        SecretariaDao::atualizarSecretaria($idSecretaria, $email, $cep, $cidade);

        // Redirecione de volta para o arquivo index.php
        header('Location: index.php');
        exit(); // Certifique-se de adicionar a chamada exit() após o redirecionamento
    } catch (Exception $e) {
        echo 'Erro ao atualizar secretaria: ' . $e->getMessage();
    }
}
?>
