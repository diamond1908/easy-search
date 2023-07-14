<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="image/png" href="https://cdn-icons-png.flaticon.com/512/122/122796.png"/>
  <link rel="stylesheet" href="../assets/css/mobile.css">
  <link rel="stylesheet" href="../assets/css/telas.css">
  <title>Cadastrar cidadão</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
$(document).ready(function() {
    $('input[name="cep"]').blur(function() {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep) {
            var url = 'https://viacep.com.br/ws/' + cep + '/json/';
            $.getJSON(url, function(data) {
                if (data && !data.erro) {
                    $('input[name="log"]').val(data.logradouro);
                    $('input[name="cidade"]').val(data.localidade);
                    $('input[name="bairro"]').val(data.bairro);
                    $('input[name="comp"]').val(data.complemento);
                } else {
                    alert('CEP inválido. Por favor, digite um CEP válido.');
                    $('input[name="cep"]').val('');
                    $('input[name="cep"]').focus();
                }
            }).fail(function() {
                alert('Ocorreu um erro ao buscar as informações do CEP. Por favor, tente novamente.');
                $('input[name="cep"]').val('');
                $('input[name="cep"]').focus();
            });
        }
    });

    // Máscara para CPF
    $('input[name="cpf"]').mask('000.000.000-00');

    // Função para validar CPF
    function validarCPF(cpf) {
    cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos do CPF

    if (cpf.length !== 11) {
      return false; // Verifica se o CPF possui 11 dígitos
    }

    // Verifica se todos os dígitos são iguais
    if (/^(\d)\1+$/.test(cpf)) {
      return false;
    }

    // Calcula os dígitos verificadores
    var soma = 0;
    var resto;

    for (var i = 1; i <= 9; i++) {
      soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
    }

    resto = (soma * 10) % 11;

    if (resto === 10 || resto === 11) {
      resto = 0;
    }

    if (resto !== parseInt(cpf.substring(9, 10))) {
      return false;
    }

    soma = 0;

    for (var j = 1; j <= 10; j++) {
      soma += parseInt(cpf.substring(j - 1, j)) * (12 - j);
    }

    resto = (soma * 10) % 11;

    if (resto === 10 || resto === 11) {
      resto = 0;
    }

    if (resto !== parseInt(cpf.substring(10, 11))) {
      return false;
    }

    return true; // CPF válido
  }

    // Função para validar o formulário
  $('form[name="cadastro"]').submit(function(event) {
    var camposPreenchidos = true;
    $('form[name="cadastro"] input').each(function() {
      if ($(this).val() === '') {
        camposPreenchidos = false;
        return false; // Sai do loop
      }
    });

    if (!validarCPF($('input[name="cpf"]').val())) {
      alert('CPF inválido. Por favor, digite um CPF válido.');
      event.preventDefault();
    } else if (!camposPreenchidos) {
      alert('Por favor, preencha todos os campos.');
      event.preventDefault();
    } else {
      // Cadastro válido, envie o formulário
      alert('Cadastro realizado com sucesso!');
      // Remova a linha abaixo se quiser enviar o formulário para o servidor
      // event.preventDefault();
      // Redirecionar para a página inicial após o cadastro
      window.location.href = "../secretaria/index.php";
    }
  });

  // ...
});
</script>

<div class="container">
    <h1><a href="../index.html" class="form-voltar"></a></h1>
    <br>
    <div><img class="logo" src="../assets/img/Sem Título-1.png" alt="..." width="210"></div>
    <br><br>
    <h1 class="form-title">Cadastro do cidadão</h1>
    <form name="cadastro" action="./cadastra-cidadao.php" method="post">
        <div class="main-user-info">
            <div class="user-input-box">
                <label for="nome">Nome</label>
                <input type="text" placeholder="Digite o nome" name="nome" required>
            </div>

            <div class="user-input-box">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" placeholder="Digite o sobrenome" name="sobrenome" required>
            </div>

            <div class="user-input-box">
                <label for="cpf">CPF</label>
                <input type="text" placeholder="Digite o CPF" name="cpf" required>
            </div>

            <div class="user-input-box">
                <label for="email">Email</label>
                <input type="text" placeholder="Digite o email" name="email" required>
            </div>

            <div class="user-input-box">
                <label for="idade">Data de nascimento</label>
                <input type="date" name="idade" required>
            </div>

            <div class="user-input-box">
                <label for="cep">CEP</label>
                <input type="text" placeholder="Digite o CEP" name="cep" required>
            </div>

            <div class="user-input-box">
                <label for="log">Logradouro</label>
                <input type="text" placeholder="Digite o nome da sua rua" name="log" readonly>
            </div>

            <div class="user-input-box">
                <label for="cidade">Cidade</label>
                <input type="text" placeholder="Digite a cidade" name="cidade" readonly>
            </div>

            <div class="user-input-box">
                <label for="bairro">Bairro</label>
                <input type="text" placeholder="Digite o bairro" name="bairro" readonly>
            </div>

            <div class="user-input-box">
                <label for="numero">Número</label>
                <input type="text" placeholder="Digite o número da residência" name="numlog">
            </div>

            <div class="user-input-box">
                <label for="complemento">Complemento</label>
                <input type="text" placeholder="Digite o complemento" name="comp">
            </div>

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
            <br>
            <div class="form-submit-btn">
                <input type="submit" value="Cadastrar">
            </div>
        </div>
    </form>
</div>

</body>
</html>
