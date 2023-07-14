<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../assets/css/mobile.css">
      <link rel="stylesheet" href="../assets/css/telas.css">
      <title>Easy-Search</title>
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
          <h1><a href="../adm/index.php" class="form-voltar"></a></h1>
          <br>
          <div><img class="logo" src="../assets/img/Sem Título-1.png" alt="Descrição da Imagem"></div>
          <br><br>
          <h1 class="form-title">Multa</h1>
          <form action="./cadastra-ocorrencia-veiculo.php" method="post" onsubmit="return exibirMensagem()">
              <div class="main-user-info">
              <?php
require_once '../dao/VeiculoDao.php';

                try {
                    $listaVeiculo = VeiculoDao::listarVeiculo();
                } catch (Exception $e) {
                    echo '<pre>';
                    print_r($e);
                    echo '</pre>';
                    echo $e->getMessage();
                }
                ?>
                <div class="user-input-box">
                    <label for="relatoOcorrencia">Placa do Veiculo:</label>
                    <select id="veiculo" name="veiculo" class="form-control">
                        <option selected>Opções...</option>
                        <?php foreach($listaVeiculo as $veiculo){ ?>
                        <option value="<?php echo $veiculo['idVeiculo'];?>">
                        <?php echo  $veiculo['placaVeiculo'];?>
                        </option>
                        <?php } ?>
                    </select>
                    </div>
                  <div class="user-input-box">
                      <label for="text">Motivo:</label>
                      <input type="text" id="motivo" name="motivo" placeholder="Digite o motivo..." required />
                  </div>

                  <div class="user-input-box">
                    <?php 
                     require_once '../dao/CidadaoDao.php';
                                                try {
                                                    $listaCidadao= CidadaoDao::listarcidadao();
                                                } catch(Exception $e) {
                                                    echo '<pre>';
                                                    print_r($e);
                                                    echo '</pre>';
                                                    echo $e->getMessage();
                                                }
                                                
                                            ?>
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
                      <label for="text">Data:</label>
                      <input type="date" id="data" name="data" placeholder="Digite a hora..." required />
                  </div>
                  <div class="user-input-box">
                      <label for="text">Hora:</label>
                      <input type="time" id="hora" name="hora" placeholder="Digite a hora..." required />
                  </div>
                  <div class="user-input-box">
                      <label for="text">Cep:</label>
                      <input type="text" id="cep" name="cep" placeholder="Digite o cep..." required />
                  </div>
                  <div class="user-input-box">
                      <label for="text">Logradouro:</label>
                      <input type="text" id="log" name="log" placeholder="Digite o logradouro..." required />
                  </div>
                  <div class="user-input-box">
                      <label for="text">Bairro:</label>
                      <input type="text" id="bairro" name="bairro" placeholder="Digite o bairro..." required />
                  </div>
                  <div class="user-input-box">
                      <label for="text">Cidade:</label>
                      <input type="text" id="cidade" name="cidade" placeholder="Digite a cidade..." required />
                  </div>
                  <div class="user-input-box">
                      <label for="relato">Valor da multa:</label>
                      <input type="money" id="valor" name="valor" placeholder="Digite o Relato" required />
                  </div>
                  
              </div>
              <div class="form-submit-btn">
                  <input type="submit" value="Cadastrar">
              </div>
          </form>
      </div>
  </body>
  </html>