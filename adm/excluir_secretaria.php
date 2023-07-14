<?php
require_once '../dao/SecretariaDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $idSecretaria = $_GET['id'];

    try {
        // Execute a operação de exclusão no banco de dados
        SecretariaDao::excluirSecretaria($idSecretaria);

        // Redirecione de volta para o arquivo index.php
        header('Location: index.php');
        exit();
    } catch (Exception $e) {
        echo 'Erro ao excluir secretaria: ' . $e->getMessage();
    }
}
?>
