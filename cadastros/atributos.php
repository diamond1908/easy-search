<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>cadastro-cidadão</title>

    <!-- Custom fonts for this template-->
    <link href="../secretaria/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../secretaria/css/cadastro-cidadao.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="form-image">
            <img src="../secretaria/img/Secure Server-rafiki.png " alt="">
        </div>
        <div class="form">
            <form method="post" action="./cadastra-atributos.php">
                <div class="form-header">
                    <div class="title">
                        <h1>Teste</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="../secretaria/index.php">Voltar</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Cor</label>
                        <input id="cor" type="text" name="cor" placeholder="Digite seu primeiro nome" required>
                    </div>

                    <div class="input-box">
                        <label for="lastname">Modelo</label>
                        <input id="modelo" type="text" name="modelo" placeholder="Digite seu sobrenome" required>
                    </div>
                    <div class="input-box">
                        <label for="email">Marca</label>
                        <input id="marca" type="text" name="marca" placeholder="Digite seu Email" required>
                    </div>

                    <div class="input-box">
                        <label for="number">Tipo veiculo</label>
                        <input id="tipo" type="text" name="tipo" placeholder="xxx.xxx.xxx.xx" required>
                    </div>

                    <div class="input-box">
                        <label for="number">Tipo Combustivel</label>
                        <input id="combustivel" type="text" name="combustivel" placeholder="xxx.xxx.xxx.xx" required>
                    </div>

                

                </div>

                

                <div class="continue-button">
                    <button>Finalizar </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>