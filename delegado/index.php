<?php require '../model/verifica-logado-delegado.php' ?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/Sem Título-1.png">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./css/cssdelegado.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

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

            <li>
              <h3 class="link-name" align="center" >
                  <i class="uil uil-estate"></i>
                  
                    Olá <?php
                    $Nome = $_SESSION['nome'];
                    echo($Nome)?>!
              </h3> 
            </li>


                <li><a href="../cadastros/policial.php">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Cadastro Policial</span>
                </a></li>

               

                <li><a href="./sobre.php">
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
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="./Images/profile.png" alt="">
        </div>


        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Ocorrências</span>
                </div>

                <div class="container">
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="service-item first-service">
                          <div class="icon"></div>
                          <img class="perda" src="Images/perdido.png" alt="">
                          <h4>Perda</h4>
                          <div class="text-button">
                          <a href="#">Cadastrar <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="service-item second-service">
                          <div class="icon"></div>
                          <img class="perda" src="Images/colisao-de-carro.png" alt="">
                          <h4>Multa ao Veiculo</h4>         
                          <div class="text-button">
                          <a href="../cadastros/veiculo_multa.php">Cadastrar <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="service-item third-service">
                          <div class="icon"></div>
                          <img class="perda" src="Images/crime.png" alt="">
                          <h4>Furto</h4>
                          <div class="text-button">
                          <a href="../cadastros/ocorrencia_veiculo.php">Cadastrar<i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="row1">
                      <div class="col-lg-3">
                        <div class="service-item fourth-service">
                          <div class="icon"></div>
                          <img class="perda" src="Images/roubo.png" alt="">
                          <h4>Roubo</h4>
                          <div class="text-button">
                          <a href="../cadastros/ocorrencia.php">Cadastrar <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="service-item third-service">
                          <div class="icon"></div>
                          <img class="perda" src="Images/abuso.png" alt="">
                          <h4>Ofensas</h4>
                          <div class="text-button">
                            <a href="#">Cadastrar <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="service-item third-service">
                          <div class="icon"></div>
                          <img class="perda" src="Images/pressao.png" alt="">
                          <h4>Pertubação</h4>
                          <div class="text-button">
                            <a href="#">Cadastrar <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>      
        </div>
    </section>
    <script src="./js/script.js"></script>
</body>
</html>