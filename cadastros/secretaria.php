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


  <!-- ... -->
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
          <script>
          $(document).ready(function() {
          $('#Cep').blur(function() {
              var cep = $(this).val().replace(/\D/g, '');
              if (cep != "") {
              var validacep = /^[0-9]{8}$/;
              if(validacep.test(cep)) {
                  $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(data) {
                  if (!("erro" in data)) {
                      $("#log").val(data.logradouro);
                      $("#Bairro").val(data.bairro);
                      $("#cidade").val(data.localidade);
                  } else {
                      alert("CEP não encontrado.");
                  }
                  });
              } else {
                  alert("Formato de CEP inválido.");
              }
              }
          });
          });
          </script>
  <!-- ... -->

    
  <div class="container">
          <h1><a href="../adm/index.php" class="form-voltar"></a></h1>
          <br>
          <div><img class="logo" src="../assets/img/Sem Título-1.png" alt="Descrição da Imagem"></div>
          <br><br>
          <h1 class="form-title">Cadastro Secretaria</h1>
          <form action="./cadastra-secretaria.php" method="post" onsubmit="return exibirMensagem()">
              <div class="main-user-info">
                  <div class="user-input-box">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" placeholder="Digite o Email" required />
                  </div>
                  <div class="user-input-box">
                      <label for="senha">Senha</label>
                      <input type="password" id="senha" name="senha" placeholder="Digite a senha" required />
                  </div>
                  <div class="user-input-box">
                      <label for="cep">CEP</label>
                      <input type="text" id="Cep" name="Cep" placeholder="Digite o cep" required />
                  </div>
                  <div class="user-input-box">
                      <label for="logradouro">Logradouro</label>
                      <input type="text" id="log" name="log" placeholder="Digite o logradouro" required />
                  </div>
                  <div class="user-input-box">
                      <label for="numlog">Numero do Logradouro</label>
                      <input type="text" id="numlog" name="numlog" placeholder="Digite o logradouro" required />
                  </div>
                  <div class="user-input-box">
                      <label for="Bairro">Bairro</label>
                      <input type="text" id="Bairro" name="Bairro" placeholder="Digite o Bairro" required />
                  </div>
                  <div class="user-input-box">
                      <label for="cidade">Cidade</label>
                      <input type="text" id="cidade" name="cidade" placeholder="Digite a Cidade" required />
                  </div>
              </div>
              <div class="form-submit-btn">
                  <input type="submit" value="Cadastrar">
              </div>
          </form>
      </div>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
          $(document).ready(function() {
              $('#Cep').blur(function() {
                  var cep = $(this).val().replace(/\D/g, '');
                  if (cep != "") {
                      var validacep = /^[0-9]{8}$/;
                      if (validacep.test(cep)) {
                          $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(data) {
                              if (!("erro" in data)) {
                                  $("#log").val(data.logradouro);
                                  $("#Bairro").val(data.bairro);
                                  $("#cidade").val(data.localidade);
                              } else {
                                  alert("CEP não encontrado.");
                              }
                          });
                      } else {
                          alert("Formato de CEP inválido.");
                      }
                  }
              });
          });

          function exibirMensagem() {
              // Verificar se todos os campos obrigatórios foram preenchidos
              var email = document.getElementById("email").value;
              var senha = document.getElementById("senha").value;
              var cep = document.getElementById("Cep").value;
              var logradouro = document.getElementById("log").value;
              var numlog = document.getElementById("numlog").value;
              var bairro = document.getElementById("Bairro").value;
              var cidade = document.getElementById("cidade").value;

              if (email === "" || senha === "" || cep === "" || logradouro === "" || numlog === "" || bairro === "" || cidade === "") {
                  alert("Por favor, preencha todos os campos.");
                  return false; // Impede o envio do formulário
              } else {
                  // Realize o cadastro ou qualquer outra ação necessária
                  // ...

                  alert("Cadastro realizado com sucesso!");
                  return true; // Permite o envio do formulário
              }
          }
      </script>
      
  </body>
  </html>