<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../assets/css/mobile.css">
      <link rel="stylesheet" href="../assets/css/telas.css">
      <title>Easy-Search</title>
  </head>
  <body>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#cep').on('blur', function() {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep !== '') {
          $.getJSON('https://viacep.com.br/ws/' + cep + '/json/', function(data) {
            if (!("erro" in data)) {
              $('#log').val(data.logradouro);
              $('#bairro').val(data.bairro);
              $('#cidade').val(data.localidade);
            } else {
              alert('CEP não encontrado.');
            }
          });
        }
      });
    });
  </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#cep').on('blur', function() {
      var cep = $(this).val().replace(/\D/g, '');
      if (cep !== '') {
        if (cep.length === 8) {
          $.getJSON('https://viacep.com.br/ws/' + cep + '/json/', function(data) {
            if (!("erro" in data)) {
              $('#log').val(data.logradouro);
              $('#bairro').val(data.bairro);
              $('#cidade').val(data.localidade);
            } else {
              alert('CEP não encontrado.');
            }
          });
        } else {
          alert('CEP inválido. O CEP deve conter 8 dígitos.');
        }
      }
    });
  });
</script>


    
  <div class="container">
          <h1><a href="../adm/index.php" class="form-voltar"></a></h1>
          <br>
          <div><img class="logo" src="../assets/img/Sem Título-1.png" alt="Descrição da Imagem"></div>
          <br><br>
          <h1 class="form-title">Cadastro do Policial</h1>
          <form action="./cadastra-policial.php" method="post" onsubmit="return exibirMensagem()">
              <div class="main-user-info">
                  <div class="user-input-box">
                      <label for="nome">Nome</label>
                      <input type="text" id="nome" name="nome" placeholder="Digite o Nome" required />
                  </div>
                  <div class="user-input-box">
                      <label for="sobrenome">Sobrenome</label>
                      <input type="text" id="sobrenome" name="sobrenome" placeholder="Digite o sobrenome" required />
                  </div>
                  <div class="user-input-box">
                      <label for="cpf">CPF</label>
                      <input type="text" id="cpf" name="cpf" placeholder="Digite o cpf" required />
                  </div>
                  <div class="user-input-box">
                      <label for="senha">Senha</label>
                      <input type="password" id="senha" name="senha" placeholder="Digite a senha" required />
                  </div>
                  <div class="user-input-box">
                      <label for="matricula">Numero da Matricula</label>
                      <input type="text" id="matricula" name="matricula" placeholder="Digite o numero da matricula" required />
                  </div>
                  <div class="user-input-box">
                      <label for="idade">Data de Nascimento</label>
                      <input type="date" id="idade" name="idade" placeholder="Digite a Data de Nascimento" required />
                  </div>
                  <div class="user-input-box">
                      <label for="cep">Cep</label>
                      <input type="text" id="cep" name="cep" placeholder="Digite o cep" required />
                  </div>
                  <div class="user-input-box">
                      <label for="log">Logradouro</label>
                      <input type="text" id="log" name="log" placeholder="Digite o logradouro" required />
                  </div>
                  <div class="user-input-box">
                      <label for="bairro">Bairro</label>
                      <input type="text" id="bairro" name="bairro" placeholder="Digite o Bairro" required />
                  </div>
                  <div class="user-input-box">
                      <label for="cidade">Cidade</label>
                      <input type="text" id="cidade" name="cidade" placeholder="Digite a Cidade" required />
                  </div>
                  <div class="user-input-box">
                      <label for="numlog">Numero de Logradouro</label>
                      <input type="text" id="numlog" name="numlog" placeholder="Digite o Numero de Logradouro" required />
                  </div>
                  <div class="user-input-box">
                      <label for="comp">Complemento</label>
                      <input type="text" id="comp" name="comp" placeholder="Digite o Complemento" required />
                  </div>
                  <h4>Gênero</h4>
                <div class="gender-group">
        
                        <div class="gender-input">
                            <input id="female" type="radio" name="genero" value="F">
                            <label for="female">Feminino</label>
                        </div>

                        <div class="gender-input">
                            <input id="male" type="radio" name="genero" value="M">
                            <label for="male">Masculino</label>
                        </div>

                        <div class="gender-input">
                            <input id="others" type="radio" name="genero" value="O">
                            <label for="others">Outro</label>
                        </div>
              </div>
              <div class="form-submit-btn">
                  <input type="submit" value="Cadastrar">
              </div>
          </form>
      </div>

</body>
</html>