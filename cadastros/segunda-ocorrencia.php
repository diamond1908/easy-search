<!DOCTYPE html>
<html>
<head>
  <title>Cadastro de Ocorrência</title>
  <style>
    /* Estilos CSS para formatar o formulário */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #8b8de9;
    }

    .container {
      background-color: #9fd9e0;
      padding: 20px;
      border-radius: 8px;
      max-width: 500px;
      margin: 0 auto;
    }

    h1 {
      text-align: center;
    }

    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .header h2 {
      margin: 0;
    }

    .back-button {
      background-color: transparent;
      border: none;
      cursor: pointer;
      font-size: 24px;
      color: #4CAF50;
    }

    .back-button:hover {
      color: #45a049;
    }

    form {
      margin-top: 20px;
    }

    label {
      display: block;
      margin-top: 10px;
    }

    input[type="text"],
    input[type="date"],
    textarea {
      width: 100%;
      padding: 5px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    select {
      width: 100%;
      padding: 5px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
    }

    input[class="submit"] {
      background-color: #4CAF;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <button class="back-button" onclick="history.go(-1)">&#8249;</button>
      <h2>EasySearch</h2>
    </div>

    <h1>Cadastro de Ocorrência </h1>


    <form>
      <label for="descricaoOcorrencia">Descrição da Ocorrência:</label>
      <textarea id="descricaoOcorrencia"  name="" rows="4" required></textarea>

      <label for="dataOcorrencia">Data da Ocorrência:</label>
      <input type="date" id="dataOcorrencia"name="" required>

      <label for="objetosOcorrencia">Objetos da Ocorrência:</label>
      <textarea id="objetosOcorrencia" name=""rows="4"></textarea>

      <label for="cepOcorrencia">CEP da Ocorrência:</label>
      <input type="cep" id="cepOcorrencia"name="" >

      <label for="horaOcorrencia">Hora da Ocorrência:</label>
      <input type="time" id="horaOcorrencia" name="">

      <label for="relatoOcorrencia">Relato da Ocorrência:</label>
      <textarea id="relatoOcorrencia" rows="4" name=""></textarea>

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



      <label for="idTipoOcorrencia">ID do Tipo de Ocorrência:</label>
      <input type="text" id="idTipoOcorrencia" name="">

      <input class="submit-2" type="submit" value="Cadastrar">
      <input type="submit" value="Mais Individos">
    </form>
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