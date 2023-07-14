<?php  require '../model/verifica-logado-adm.php' ?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="./css/adm.css">
    <link rel="icon" type="image/png" href="../assets/img/Sem Título-1.png"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <title>Bem Vindo ADM</title> 
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
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Painel</span>
                </a></li>
                <li><a href="../cadastros/secretaria.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Cadastra Secretaria</span>
                </a></li>
                
            </ul>
            
            <ul class="logout-mode">
                <li><a href="../model/logout-adm.php">
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
            
            <img src="./Images/Logo da Empresa2.png" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Bem Vindo ADM</span>
                </div>

                <div class="boxes">
                    <div class="box box3">
                    <i class="uil uil-thumbs-up"></i>
                        <span class="text">Adiministração</span>
                        
                    </div>
                    <div class="box box3">
                    <i class="uil uil-comments"></i>
                        <span class="text">bem-vindo ao</span>
                        
                    </div>
                    <div class="box box3">
                    <i class="uil uil-search"></i>
                        <span class="text">Easy-Search</span>
                        
                        
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Secretarias cadastradas</span>
                    <?php
                     require_once '../dao/SecretariaDao.php';
                    try {
                        $listasecretaria = SecretariaDao::listarSecretaria();
                    } catch(Exception $e) {
                        echo '<pre>';
                            print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }
                ?>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Cep</th>
                            <th scope="col">cidade</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listasecretaria as $secretaria){ ?>
                        <tr>
                        <th scope="row"><?php echo $secretaria['idSecretaria']; ?></th>
                        <td  class="table-cell"><?php echo $secretaria['emailSecretaria']; ?></td>
                        <td  class="table-cell"><?php echo $secretaria['cepSecretaria']; ?></td>
                        <td  class="table-cell"><?php echo $secretaria['cidadeSecretaria']; ?></td>
                        <td class="table-cell">
                        <button class="edit-button" data-toggle="modal" data-target="#modalEditar" data-id="<?php echo $secretaria['idSecretaria']; ?>" data-email="<?php echo $secretaria['emailSecretaria']; ?>" data-cep="<?php echo $secretaria['cepSecretaria']; ?>" data-cidade="<?php echo $secretaria['cidadeSecretaria']; ?>">Editar</button>
                        </td>
                        <td class="excluir-buttom"><a href="#" onclick="confirmarExclusao()">Excluir</a></td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                    
                
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>


            <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Secretaria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                        <div class="modal-body">
                        <form id="form" action="atualizar_secretaria.php" method="post" onsubmit="return confirmarAtualizacao()">
                        <input type="hidden" name="id" id="modalEditarId">
                        <div class="form-group">
                        <label for="modalEditarEmail">Email</label>
                        <input type="email" class="form-control" id="modalEditarEmail" name="email">
                    </div>
                        <div class="form-group">
                            <label for="modalEditarCep">CEP</label>
                            <input type="text" class="form-control" id="modalEditarCep" name="cep">
                        </div>
                        <div class="form-group">
                            <label for="modalEditarCidade">Cidade</label>
                            <input type="text" class="form-control" id="modalEditarCidade" name="cidade">
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                        </form>
                        </div>
                        </div>
                </div>
                </div>


            <script>
            $(document).ready(function() {
                $('.edit-button').click(function() {
                    var id = $(this).data('id');
                    var email = $(this).data('email');
                    var cep = $(this).data('cep');
                    var cidade = $(this).data('cidade');

                    $('#modalEditarId').val(id);
                    $('#modalEditarEmail').val(email);
                    $('#modalEditarCep').val(cep);
                    $('#modalEditarCidade').val(cidade);
                });
            });
           </script>


            <script>
                function confirmarAtualizacao() {
                    if (confirm("Tem certeza que deseja atualizar as informações?")) {
                        // Ação a ser executada quando a pessoa confirmar a atualização
                        // Por exemplo, você pode enviar os dados do formulário para o servidor
                        return true;
                    } else {
                        // Ação a ser executada quando a pessoa cancelar a atualização
                        return false;
                    }
                }
                </script>

            <script>
                    function confirmarExclusao() {
                        if (confirm("Tem certeza que deseja excluir esta secretaria?")) {
                            // Ação a ser executada quando a pessoa confirmar a exclusão
                            // Por exemplo, você pode redirecionar para a página de exclusão
                            window.location.href = "excluir_secretaria.php?id=<?php echo $secretaria['idSecretaria']; ?>";
                        }
                    }
                </script>






</body> 
</html>