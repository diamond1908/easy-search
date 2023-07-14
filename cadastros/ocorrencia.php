<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../assets/css/mobile.css">
      <link rel="stylesheet" href="../assets/css/telas.css">
      <title>Easy Search</title>
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
          <div><img class="logo" src="../assets/img/Sem Título-1.png" alt="Descrição da Imagem"></div>
          <br><br>
          <h1 class="form-title">Roubo</h1>
          <form action="cadastra-ocorrencia.php" method="post">
              <div class="main-user-info">
                  <div class="user-input-box">
                      <label for="descricaoOcorrencia">Descrição da ocorrência:</label>
                      <input type="text" id="descricaoOcorrencia" name="desc" placeholder="Digite a ocorrência..." required />
                  </div>

                  <div class="user-input-box">
                      <label for="dataOcorrencia">Data da ocorrência:</label>
                      <input type="date" id="dataOcorrencia" name="data" placeholder="Digite a data da ocorrência..." required />
                  </div>

                  <div class="user-input-box">
                      <label for="objetosOcorrencia">Objetos da ocorrência:</label>
                      <input type="text" id="objetosOcorrencia" name="objetos" placeholder="Digite os objetos da ocorrência..." required />
                  </div>

                  <div class="user-input-box">
                      <label for="cepOcorrencia">CEP:</label>
                      <input type="cep" id="cepOcorrencia" name="cep" placeholder="Digite o CEP..." required />
                  </div>

                  <div class="user-input-box">
                      <label for="horaOcorrencia">Hora:</label>
                      <input type="time" id="horaOcorrencia" name="hora" placeholder="Digite a hora..." required />
                  </div>

                  <div class="user-input-box">
                      <label for="relatoOcorrencia">Relato:</label>
                      <input type="text" id="relatoOcorrencia" name="relato" placeholder="Relate a ocorrência..." required />
                  </div>
                  <div class="user-input-box">
                  <?php
require_once '../dao/CidadaoDao.php';

                try {
                    $listaCidadao = CidadaoDao::listarcidadao();
                } catch (Exception $e) {
                    echo '<pre>';
                    print_r($e);
                    echo '</pre>';
                    echo $e->getMessage();
                }
                ?>

                    <label for="relatoOcorrencia">Cpf do Cidadao:</label>
                    <select id="cidadao" name="cidadao" class="form-control">
                        <option selected>Opções...</option>
                        <?php foreach($listaCidadao as $cidadao){ ?>
                        <option value="<?php echo $cidadao['idCidadao'];?>">
                        <?php echo  $cidadao['cpfCidadao'];?>
                        </option>
                        <?php } ?>
                    </select>
                    </div>
                  <div class="user-input-box">
                    <?php
require_once '../dao/TipoDao.php';

                try {
                    $listatipo = TipoDao::listarTipoOcorrencia();
                } catch (Exception $e) {
                    echo '<pre>';
                    print_r($e);
                    echo '</pre>';
                    echo $e->getMessage();
                }
                ?>

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