<?php
require_once '../dao/DelegadoDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $idDelegado = $_GET['id'];

    try {
        // Execute a operação de exclusão no banco de dados
        DelegadoDao::excluirDelegado($idDelegado);

        // Redirecione de volta para o arquivo index.php
        header('Location: index.php');
        exit();
    } catch (Exception $e) {
        echo 'Erro ao excluir secretaria: ' . $e->getMessage();
    }
}
?>
