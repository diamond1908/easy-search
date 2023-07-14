<?php
require_once '../dao/CidadaoDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $idCidadao = $_GET['id'];

    try {
        // Execute a operação de exclusão no banco de dados
        CidadaoDao::excluirCidadao($idCidadao);

        // Redirecione de volta para o arquivo index.php
        header('Location: index.php');
        exit();
    } catch (Exception $e) {
        echo 'Erro ao excluir o cidadao: ' . $e->getMessage();
    }
}
?>
