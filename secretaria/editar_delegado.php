<?php
require_once '../dao/DelegadoDao.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $idDelegadp = $_GET['id'];

    try {
        // Recupere os dados existentes da secretaria do banco de dados
        $delegadp = DelegadoDao::buscarDelegadoPorId($idDelegado);

        // Exiba um formulário preenchido com os dados existentes
        ?>
        <form method="POST" action="atualizar_delegado.php">
            <input type="hidden" name="id" value="<?php echo $delegado['idDelegado']; ?>">
            <input type="text" name="nome" value="<?php echo $delegado['nomeDelegado']; ?>">
            <input type="text" name="delegado" value="<?php echo $delegado['LogradouroDelegado']; ?>">
            <input type="text" name="bairro" value="<?php echo $delegado['BairroDelegado']; ?>">
            <input type="text" name="cidade" value="<?php echo $delegado['cidadeDelegado']; ?>">
            <input type="text" name="cpf" value="<?php echo $delegado['cpfDelegado']; ?>">
            <input type="text" name="cep" value="<?php echo $delegado['cepDelegado']; ?>">
            <button type="submit">Atualizar Delegado</button>
        </form>
        <?php
    } catch (Exception $e) {
        echo 'Erro ao buscar o Delegado: ' . $e->getMessage();
    }
}
?>