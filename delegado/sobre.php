<?php require '../model/verifica-logado-delegado.php' ?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./css/cssdelegado.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <title>Painel de controle</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="./Images/ease.png" alt="">
            </div>

            <span class="logo_name"></span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
            <div align="center" >
            <li><a href="./index.php">
                    
                    <i class="uil uil-estate"></i>
                    <span class="link-name"> Olá <?php
                                                    $Nome = $_SESSION['nome'];
                    
                    echo($Nome)?>!</span>
                    
                </a></li>
                </div>

                <li><a href="../cadastros/policial.php">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Cadastro Policial</span>
                </a></li>

               

                <li><a href="#">
                <i class="uil uil-share"></i>
                    <span class="link-name">Sobre a Delegacia Online</span>
                </a></li>
            </ul>
            <ul class="logout-mode">
                <li><a href="../model/logout-delegado.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>


            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <img src="./Images/Logo da Empresa2.png" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Policiais</span>
                </div>

                    <?php
                     require_once '../dao/PolicialDao.php';
                    try {
                        $listaPolicial = PolicialDao::listar();
                    } catch(Exception $e) {
                        echo '<pre>';
                            print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }
                ?>
                </div>
                <table class="table table-striped" border=1 >
                    <thead>
                        <tr>
                            <th scope="col" align="center" >#</th>
                            <th scope="col" align="center">Nome</th>
                            <th scope="col" align="center">Cep</th>
                            <th scope="col" align="center">cidade</th>
                            <th scope="col" align="center">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listaPolicial as $policial){ ?>
                        <tr>
                        <th scope="row"><?php echo $policial['idPolicial']; ?></th>
                        <td><?php echo $policial['nomePolicial']; ?></td>
                        <td><?php echo $policial['cepPolicial']; ?></td>
                        <td><?php echo $policial['cidadePolicial']; ?></td>
                        <button class="edit-button2" data-toggle="modal" data-target="#modalEditarCidadao" data-id="<?php echo $Cidadao['idCidadao']; ?>" data-nome="<?php echo $Cidadao['nomeCidadao']; ?>" data-logradouro="<?php echo $Cidadao['logradouroCidadao']; ?>" data-bairro="<?php echo $Cidadao['bairroCidadao']; ?>" data-cidade="<?php echo $Cidadao['cidadeCidadao']; ?>" data-cpf="<?php echo $Cidadao['cpfCidadao']; ?>" data-cep="<?php echo $Cidadao['cepCidadao']; ?>">Editar</button>
                                </td>
                                <td class="excluir-buttom"><a href="#" onclick="confirmarExclusao()">Excluir</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                    
                
            </div>
                        
                      
            </div>      
        </div>
    </section>
    <script src="./js/script.js"></script>
</body>
</html>