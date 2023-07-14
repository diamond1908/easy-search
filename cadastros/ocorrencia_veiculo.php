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
          <h1 class="form-title">Ocorrência Veiculo</h1>
          <form action="./cadastra-ocorrencia-veiculo.php" method="post">
              <div class="main-user-info">
                  <div class="user-input-box">
                      <label for="desc">Descrição:</label>
                      <input type="text" id="desc" name="desc" placeholder="Digite a Descrição" required />
                  </div>

                  <div class="user-input-box">
                      <label for="data">Data:</label>
                      <input type="date" id="data" name="data" placeholder="Digite a data" required />
                  </div>

                  <div class="user-input-box">
                      <label for="objeto">Objeto:</label>
                      <input type="text" id="objeto" name="objeto" placeholder="Digite qual objeto foi usado" required />
                  </div>

                  <div class="user-input-box">
                      <label for="cep">Cep:</label>
                      <input type="text" id="cep" name="cep" placeholder="Digite a senha" required />
                  </div> 
                  
                  <div class="user-input-box">
                      <label for="hora">Hora:</label>
                      <input type="time" id="hora" name="hora" placeholder="Digite a Hora" required />
                  </div>

                  <div class="user-input-box">
                      <label for="relato">Relato:</label>
                      <input type="text" id="relato" name="relato" placeholder="Digite o Relato" required />
                  </div>
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
                    <?php require_once '../dao/TipoDao.php';

                try {
                    $listatipo = TipoDao::listarTipoOcorrencia();
                } catch (Exception $e) {
                    echo '<pre>';
                    print_r($e);
                    echo '</pre>';
                    echo $e->getMessage();
                }
                ?>
<div class="user-input-box">
                    <label for="relatoOcorrencia">Tipo da Ocorrencia:</label>
                    <select id="tipo" name="tipo" class="form-control">
                        <option selected>Opções...</option>
                        <?php foreach($listatipo as $tipo){ ?>
                        <option value="<?php echo $tipo['idTipoOcorrencia'];?>">
                        <?php echo  $tipo['nomeOcorrencia'];?>
                        </option>
                        <?php } ?>
                    </select>
                    </div>
              </div>
              <div class="form-submit-btn">
                  <input type="submit" value="Cadastrar">
              </div>
          </form>
      </div>

      

         
      
  </body>
  </html>