<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/122/122796.png"/>
  <link rel="stylesheet" href="../assets/css/mobile.css">
  <link rel="stylesheet" href="../assets/css/telas.css">
  <title>Cadastrar veículo</title>
  <style>
        .form-control{
    width: 95%;
    border-radius: 20px;
    height: 37px;
}
      </style>
</head>
<body>
   
    <div class="container">
        <h1 ><a href="../index.html"  class="form-voltar"></a></h1>
        <br>
        <div><img class="logo" src="../assets/img/Sem Título-1.png" alt="..." width="210"></div>
        <br><br>
      <h1 class="form-title">Cadastro do veículo</h1>
      <form action="./cadastra-veiculo.php" method="post">
      <?php
                            require_once '../dao/VeiculoDao.php';
                            require_once '../dao/CidadaoDao.php';
                            require_once '../dao/AtributosDao.php';
                            
                            try {
                                $listamarca = AtributosDao::listarmarca();
                            } catch(Exception $e) {
                                echo '<pre>';
                                print_r($e);
                                echo '</pre>';
                                echo $e->getMessage();
                            }
                            try {
                                $listamodelo = AtributosDao::listarmodelo();
                            } catch(Exception $e) {
                                echo '<pre>';
                                print_r($e);
                                echo '</pre>';
                                echo $e->getMessage();
                            }
                            try {
                                $listacor = AtributosDao::listarcor();
                            } catch(Exception $e) {
                                echo '<pre>';
                                print_r($e);
                                echo '</pre>';
                                echo $e->getMessage();
                            }
                            try {
                                $listatipo= AtributosDao::listartipo();
                            } catch(Exception $e) {
                                echo '<pre>';
                                print_r($e);
                                echo '</pre>';
                                echo $e->getMessage();
                            }
                            try {
                                $listacombustivel= AtributosDao::listarcombustivel();
                            } catch(Exception $e) {
                                echo '<pre>';
                                print_r($e);
                                echo '</pre>';
                                echo $e->getMessage();
                            }
                            try {
                                $listaCidadao= CidadaoDao::listarcidadao();
                            } catch(Exception $e) {
                                echo '<pre>';
                                print_r($e);
                                echo '</pre>';
                                echo $e->getMessage();
                            }
                            
                        ?>
        <div class="main-user-info">
          
          <div class="user-input-box">
            <label for="marca">Marca</label>
            <select id="marca" name="marca" class="form-control">
                                    <option selected>Opções...</option>
                                    <?php foreach($listamarca as $marca){ ?>
                                    <option value="<?php echo $marca['idMarca'];?>">
                                        <?php echo  $marca['nomeMarca'];?>
                                    </option>
                                    <?php } ?>
                                    </select>
          </div>
          
          <div class="user-input-box">
            <label for="modelo">Modelo</label>
            <select id="modelo" name="modelo" class="form-control">
                                    <option selected>Opções...</option>
                                    <?php foreach($listamodelo as $modelo){ ?>
                                    <option value="<?php echo $modelo['idModeloVeiculo'];?>">
                                        <?php echo  $modelo['nomeModeloVeiculo'];?>
                                    </option>
                                    <?php } ?>
                                    </select>
          </div>

          <div class="user-input-box">
            <label for="cor">Cor</label>
            <select id="cor" name="cor" class="form-control">
                                    <option selected>Opções...</option>
                                    <?php foreach($listacor as $cor){ ?>
                                    <option value="<?php echo $cor['idCor'];?>">
                                        <?php echo  $cor['nomeCor'];?>
                                    </option>
                                    <?php } ?>
                                    </select>
          </div>
          <div class="user-input-box">
            <label for="tipo">Tipo do veículo</label>
            <select id="tipo" name="tipo" class="form-control">
                                    <option selected>Opções...</option>
                                    <?php foreach($listatipo as $tipoVeiculo){ ?>
                                    <option value="<?php echo $tipoVeiculo['idTipoVeiculo'];?>">
                                        <?php echo  $tipoVeiculo['nomeTipoVeiculo'];?>
                                    </option>
                                    <?php } ?>
                                    </select>
          </div>
          <div class="user-input-box">
            <label for="cidadao">Proprietário</label>
            <select id="cidadao" name="cidadao" class="form-control">
                        <option selected>Opções...</option>
                        <?php foreach($listaCidadao as $cidadao){ ?>
                        <option value="<?php echo $cidadao['idCidadao'];?>">
                        <?php echo $cidadao['cpfCidadao'];?>
                        </option>
                        <?php } ?>
                    </select>
          </div>
          <div class="user-input-box">
            <label for="combustivel">Tipo de combustível</label>
            <select id="combustivel" name="combustivel" class="form-control">
                                    <option selected>Opções...</option>
                                    <?php foreach($listacombustivel as $tipoCombustivel){ ?>
                                    <option value="<?php echo $tipoCombustivel['idTipoCombustivel'];?>">
                                        <?php echo  $tipoCombustivel['TipoCombustivel'];?>
                                    </option>
                                    <?php } ?>
                                    </select>
          </div>
          <div class="user-input-box">
            <label for="placa">Placa</label>
            <input type="text" placeholder="Digite o numero da placa" width="225px" name= 'placa'>
          </div>
          <div class="user-input-box">
            <label for="eixo">Eixo</label>
            <input type="number" placeholder="Digite a quantidade de eixos" name= 'eixo'>
          </div>
          <div class="user-input-box">
            <label for="ano">Ano de fabricação</label>
            <input type="date" placeholder="Digite o ano de fabricação" name= 'ano'>
          </div>
          
            <div class="form-submit-btn">
            <input type="submit" value="Cadastrar">
    </form>
  </div>
  </div>    
        </div>
     
    </div>
    <script>
  const inputCpf = document.getElementById('pesquisaCidadao');
  const selectCidadao = document.getElementById('cidadao');

  inputCpf.addEventListener('input', function() {
    const cpf = inputCpf.value.trim();

    // Iterar sobre as opções do select
    for (let i = 0; i < selectCidadao.options.length; i++) {
      const option = selectCidadao.options[i];
      const cpfOption = option.textContent.trim();

      // Verificar se o CPF da opção corresponde ao CPF digitado
      if (cpfOption === cpf) {
        // Selecionar a opção correspondente ao CPF digitado
        selectCidadao.selectedIndex = i;
        break;
      }
    }
  });
</script>
</body>
</html>