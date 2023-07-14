<?php session_start();?>
<?php require '../model/verifica-logado-secretaria.php'; ?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/secretaria.css">
    <link rel="icon" type="image/png" href="../assets/img/Sem Título-1.png"/>
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
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Painel</span>
                </a></li>
                <li><a href="../cadastros/delegado.php">
                     <i class="uil uil-share"></i>
                    <span class="link-name">Delegado</span>
                </a></li>
                <li><a href="../cadastros/cidadao.php">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Cadastro Cidadão</span>
                </a></li>


                <li><a href="../cadastros/veiculo.php">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Cadastro Veículo</span>
                </a></li>
            </ul>
            <ul class="logout-mode">
                <li><a href="../model/logout-secretaria.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Painel</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Secretaria</span>
                        <span class="text">
                            <?php
                                $Email = $_SESSION['email'];
                                $Id = $_SESSION['id'];
                                echo($Email);
                            ?>
                        </span>
                    </div>
                    <div class="box box1">
                        <i class="uil uil-comments"></i>
                        <span class="text">Bem-vindo ao</span>
                    </div>
                    <div class="box box1">
                        <i class="uil uil-search"></i>
                        <span class="text">Easy-Search</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                
                    <i class="uil uil-clock-three" id="btnDelegados"></i>
                    <span class="text">Delegados cadastrados</span>

                </div>
               
                <div class="search-box">
                    <i class="uil uil-search"></i>
                    <input type="text" id="pesquisaDelegado" placeholder="Pesquisar delegado...">
                </div>

                <?php
                    require_once '../dao/DelegadoDao.php';
                    try {
                        $listaDelegado = DelegadoDao::listardelegado();
                    } catch (Exception $e) {
                        echo '<pre>';
                        print_r($e);
                        echo '</pre>';
                        echo $e->getMessage();
                    }
                ?>

                <table id="tableDelegados" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Logradouro</th>
                            <th scope="col">Bairro</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">CPF</th>
                            <th scope="col">CEP</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Excluir</th>
                    </thead>
                    <tbody>
                        <?php foreach ($listaDelegado as $Delegado) { ?>
                            <?php if ($Delegado['idSecretaria'] == $Id) { ?> 
                                <tr>
                                    <th class="table-cell" scope="row"><?php echo $Delegado['idDelegado']; ?></th>
                                    <td class="table-cell"><?php echo $Delegado['nomeDelegado']; ?></td>
                                    <td class="table-cell"><?php echo $Delegado['logradouroDelegado']; ?></td>
                                    <td class="table-cell"><?php echo $Delegado['bairroDelegado']; ?></td>
                                    <td class="table-cell"><?php echo $Delegado['cidadeDelegado']; ?></td>
                                    <td class="table-cell"><?php echo $Delegado['cpfDelegado']; ?></td>
                                    <td class="table-cell"><?php echo $Delegado['cepDelegado']; ?></td>
                                    <td class="table-cell">
                                    <button class="edit-button" data-toggle="modal" data-target="#modalEditar" data-id="<?php echo $Delegado['idDelegado']; ?>" data-nome="<?php echo $Delegado['nomeDelegado']; ?>" data-logradouro="<?php echo $Delegado['logradouroDelegado']; ?>" data-bairro="<?php echo $Delegado['bairroDelegado']; ?>" data-cidade="<?php echo $Delegado['cidadeDelegado']; ?>" data-cpf="<?php echo $Delegado['cpfDelegado']; ?>" data-cep="<?php echo $Delegado['cepDelegado']; ?>">Editar</button>
                                    </td>
                                    <td class="excluir-buttom"><a href="#" onclick="confirmarExclusao()">Excluir</a></td>
                                    
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>

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

                <div class="title">
                    <i class="uil uil-users-alt"id="btnCidadaos" ></i>
                    <span class="text">Cidadãos cadastrados</span>
                </div>

                <div class="search-box">
                    <i class="uil uil-search"></i>
                    <input type="text" id="pesquisaCidadao" placeholder="Pesquisar cidadão...">
                </div>

                <table id="tableCidadaos" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Logradouro</th>
                            <th scope="col">Bairro</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">CPF</th>
                            <th scope="col">CEP</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaCidadao as $Cidadao) { ?>
                            <tr>
                                <th class="table-cell" scope="row"><?php echo $Cidadao['idCidadao']; ?></th>
                                <td class="table-cell"><?php echo $Cidadao['nomeCidadao']; ?></td>
                                <td class="table-cell"><?php echo $Cidadao['logradouroCidadao']; ?></td>
                                <td class="table-cell"><?php echo $Cidadao['bairroCidadao']; ?></td>
                                <td class="table-cell"><?php echo $Cidadao['cidadeCidadao']; ?></td>
                                <td class="table-cell"><?php echo $Cidadao['cpfCidadao']; ?></td>
                                <td class="table-cell"><?php echo $Cidadao['cepCidadao']; ?></td>
                                <td class="table-cell">
                                <button class="edit-button2" data-toggle="modal" data-target="#modalEditarCidadao" data-id="<?php echo $Cidadao['idCidadao']; ?>" data-nome="<?php echo $Cidadao['nomeCidadao']; ?>" data-logradouro="<?php echo $Cidadao['logradouroCidadao']; ?>" data-bairro="<?php echo $Cidadao['bairroCidadao']; ?>" data-cidade="<?php echo $Cidadao['cidadeCidadao']; ?>" data-cpf="<?php echo $Cidadao['cpfCidadao']; ?>" data-cep="<?php echo $Cidadao['cepCidadao']; ?>">Editar</button>
                                </td>
                                <td class="excluir-buttom"><a href="#" onclick="confirmarExclusao()">Excluir</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
                require_once '../dao/VeiculoDao.php';
                try {
                    $listarVeiculo = VeiculoDao::listarVeiculo();
                } catch (Exception $e) {
                    echo '<pre>';
                    print_r($e);
                    echo '</pre>';
                    echo $e->getMessage();
                }
                ?>

                <div class="title">
                    <i class="uil uil-users-alt"id="btnCidadaos" ></i>
                    <span class="text">Veiculos cadastrados</span>
                </div>

                <div class="search-box">
                    <i class="uil uil-search"></i>
                    <input type="text" id="pesquisaVeiculo" placeholder="Pesquisar veiculo...">
                </div>

                <table id="tableVeiculos" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Placa</th>
                            <th scope="col">Eixo do veículo</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Cor</th>
                            <th scope="col">Combustível</th>
                            <th scope="col">Tipo do veículo</th>
                            <th scope="col">Dono do veículo</th>
                        </tr>
                    </thead>
                    <tbody>
                <tbody>
                        <?php foreach ($listarVeiculo as $veiculo) { ?>
                            <tr>
                                <th class="table-cell" scope="row"><?php echo $veiculo['idVeiculo']; ?></th>
                                <td class="table-cell"><?php echo $veiculo['placaVeiculo']; ?></td>
                                <td class="table-cell"><?php echo $veiculo['tipoEixoVeiculo']; ?></td>
                                <td class="table-cell"><?php echo $veiculo['nomeModeloVeiculo']; ?></td>
                                <td class="table-cell"><?php echo $veiculo['nomeMarca']; ?></td>
                                <td class="table-cell"><?php echo $veiculo['nomeCor']; ?></td>
                                <td class="table-cell"><?php echo $veiculo['TipoCombustivel']; ?></td>
                                <td class="table-cell"><?php echo $veiculo['nomeTipoVeiculo']; ?></td>
                                <td class="table-cell"><?php echo $veiculo['cpfCidadao']; ?></td>
                                <td class="table-cell"><a href="exclusao_veiculo.php?id=<?php echo $veiculo['idVeiculo'];?>">Excluir</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        function pesquisarDelegado() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("pesquisaDelegado");
            filter = input.value.toUpperCase();
            table = document.getElementById("tableDelegados");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];

                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        document.getElementById("pesquisaDelegado").addEventListener("input", pesquisarDelegado);

        function pesquisarCidadao() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("pesquisaCidadao");
            filter = input.value.toUpperCase();
            table = document.getElementById("tableCidadaos");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];

                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        document.getElementById("pesquisaCidadao").addEventListener("input", pesquisarCidadao);
    </script>
</body>

</html>

<?php

        require_once '../dao/DelegadoDao.php';
        require_once '../dao/CidadaoDao.php';
        require_once '../dao/VeiculoDao.php';
        try {
            $listaDelegado = DelegadoDao::listardelegado();
        } catch (Exception $e) {
            echo '<pre>';
            print_r($e);
            echo '</pre>';
            echo $e->getMessage();
        }

        try {
            $listaCidadao = CidadaoDao::listarcidadao();
        } catch (Exception $e) {
            echo '<pre>';
            print_r($e);
            echo '</pre>';
            echo $e->getMessage();
        }

        try {
            $listarVeiculo = VeiculoDao::listarVeiculo();
        } catch (Exception $e) {
            echo '<pre>';
            print_r($e);
            echo '</pre>';
            echo $e->getMessage();
        }
        ?>
            </div>
        </div>
    </section>
        </div>
    </section>
    <script src="./js/script.js">

    </script>

    <script>
        function pesquisarDelegado() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("pesquisaDelegado");
            filter = input.value.toUpperCase();
            table = document.getElementById("tableDelegados");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[4];

                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        document.getElementById("pesquisaDelegado").addEventListener("input", pesquisarDelegado);

        function pesquisarCidadao() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("pesquisaCidadao");
            filter = input.value.toUpperCase();
            table = document.getElementById("tableCidadaos");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[4];

                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        document.getElementById("pesquisaCidadao").addEventListener("input", pesquisarCidadao);

        document.getElementById("btnDelegados").addEventListener("click", function(){
            document.getElementById("tableDelegados").style.display = "table";
            document.getElementById("tableCidadaos").style.display = "none";
        });

        document.getElementById("btnCidadaos").addEventListener("click", function(){
            document.getElementById("tableDelegados").style.display = "none";
            document.getElementById("tableCidadaos").style.display = "table";
        });
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>


            <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Delegado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                        <div class="modal-body">
                        <form id="form" action="atualizar_delegado.php" method="post" onsubmit="return confirmarAtualizacao()">
                        <input type="hidden" name="id" id="modalEditarId">
                        <div class="form-group">
                        <label for="modalEditarNome">nome</label>
                        <input type="nome" class="form-control" id="modalEditarNome" name="nome">
                    </div>
                    <div class="form-group">
                            <label for="modalEditarLogradouro">logradouro</label>
                            <input type="text" class="form-control" id="modalEditarLogradouro" name="logradouro">
                        </div>
                        <div class="form-group">
                            <label for="modalEditarBairro">bairro</label>
                            <input type="text" class="form-control" id="modalEditarBairro" name="bairro">
                        </div>
                        <div class="form-group">
                            <label for="modalEditarCidade">Cidade</label>
                            <input type="text" class="form-control" id="modalEditarCidade" name="cidade">
                        </div>
                        <div class="form-group">
                            <label for="modalEditarCpf">Cpf</label>
                            <input type="text" class="form-control" id="modalEditarCpf" name="cpf">
                        </div>
                        <div class="form-group">
                            <label for="modalEditarCep">Cep</label>
                            <input type="text" class="form-control" id="modalEditarCep" name="cep">
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                        </form>
                        </div>
                        </div>
                </div>
                </div>


                <div class="modal fade" id="modalEditarCidadao" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Cidadao</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                        <div class="modal-body">
                        <form id="form" action="atualizar_cidadao.php" method="post" onsubmit="return confirmarAtualizacao()">
                        <input type="hidden" name="id" id="modalEditarIdCidadao">
                        <div class="form-group">
                        <label for="modalEditarNomeCidadao">nome</label>
                        <input type="nome" class="form-control" id="modalEditarNomeCidadao" name="nome">
                    </div>
                    <div class="form-group">
                            <label for="modalEditarLogradouroCidadao">logradouro</label>
                            <input type="text" class="form-control" id="modalEditarLogradouroCidadao" name="logradouro">
                        </div>
                        <div class="form-group">
                            <label for="modalEditarBairroCidadao">bairro</label>
                            <input type="text" class="form-control" id="modalEditarBairroCidadao" name="bairro">
                        </div>
                        <div class="form-group">
                            <label for="modalEditarCidadeCidadao">Cidade</label>
                            <input type="text" class="form-control" id="modalEditarCidadeCidadao" name="cidade">
                        </div>
                        <div class="form-group">
                            <label for="modalEditarCpfCidadao">Cpf</label>
                            <input type="text" class="form-control" id="modalEditarCpfCidadao" name="cpf">
                        </div>
                        <div class="form-group">
                            <label for="modalEditarCepCidadao">Cep</label>
                            <input type="text" class="form-control" id="modalEditarCepCidadao" name="cep">
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
                    var nome = $(this).data('nome');
                    var logradouro = $(this).data('logradouro');
                    var bairro = $(this).data('bairro');
                    var cidade = $(this).data('cidade');
                    var cpf = $(this).data('cpf');
                    var cep = $(this).data('cep');

                    $('#modalEditarId').val(id);
                    $('#modalEditarNome').val(nome);
                    $('#modalEditarLogradouro').val(logradouro);
                    $('#modalEditarBairro').val(bairro);
                    $('#modalEditarCidade').val(cidade);
                    $('#modalEditarCpf').val(cpf);
                    $('#modalEditarCep').val(cep);
                    });
                });
                </script>
            
            <script>
                $(document).ready(function() {
                $('.edit-button2').click(function() {
                    var id = $(this).data('id');
                    var nome = $(this).data('nome');
                    var logradouro = $(this).data('logradouro');
                    var bairro = $(this).data('bairro');
                    var cidade = $(this).data('cidade');
                    var cpf = $(this).data('cpf');
                    var cep = $(this).data('cep');

                    $('#modalEditarIdCidadao').val(id);
                    $('#modalEditarNomeCidadao').val(nome);
                    $('#modalEditarLogradouroCidadao').val(logradouro);
                    $('#modalEditarBairroCidadao').val(bairro);
                    $('#modalEditarCidadeCidadao').val(cidade);
                    $('#modalEditarCpfCidadao').val(cpf);
                    $('#modalEditarCepCidadao').val(cep);
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
                        if (confirm("Tem certeza que deseja excluir este Delegado?")) {
                            // Ação a ser executada quando a pessoa confirmar a exclusão
                            // Por exemplo, você pode redirecionar para a página de exclusão
                            window.location.href = "excluir_delegado.php?id=<?php echo $Delegado['idDelegado']; ?>";
                        }
                    }
                </script>

                <script>
                    function confirmarExclusao() {
                        if (confirm("Tem certeza que deseja excluir este Delegado?")) {
                            // Ação a ser executada quando a pessoa confirmar a exclusão
                            // Por exemplo, você pode redirecionar para a página de exclusão
                            window.location.href = "excluir_cidadao.php?id=<?php echo $Cidadao['idCidadao']; ?>";
                        }
                    }
                </script>








</body>
</html>


