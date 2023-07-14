<?php
require_once '../dao/SecretariaDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $idSecretaria = $_GET['id'];

    try {
        // Recupere os dados existentes da secretaria do banco de dados
        $secretaria = SecretariaDao::buscarSecretariaPorId($idSecretaria);

        // Exiba um formulário preenchido com os dados existentes
        ?>
        <form method="POST" action="atualizar_secretaria.php">
            <input type="hidden" name="id" value="<?php echo $secretaria['idSecretaria']; ?>">
            <input type="text" name="email" value="<?php echo $secretaria['emailSecretaria']; ?>">
            <input type="text" name="cep" value="<?php echo $secretaria['cepSecretaria']; ?>">
            <input type="text" name="cidade" value="<?php echo $secretaria['cidadeSecretaria']; ?>">
            <button type="submit">Atualizar Secretaria</button>
        </form>
        <?php
    } catch (Exception $e) {
        echo 'Erro ao buscar secretaria: ' . $e->getMessage();
    }
}
?>
