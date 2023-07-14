<?php
    require_once '../model/Veiculo.php';
     require_once '../model/Conexao.php';


     class VeiculoDao {
         function cadastrar($veiculo) {
            $conexao = Conexao::conectar();
    
            $queryInsert = "INSERT INTO tbVeiculo (idModeloVeiculo, idMarca, idCor, idTipoVeiculo, placaVeiculo, idTipoCombustivel, tipoEixoVeiculo, idCidadao)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
            $prepareStatement = $conexao->prepare($queryInsert);
    
            $prepareStatement->bindValue(1, $veiculo->getModelo()->getId());
            $prepareStatement->bindValue(2, $veiculo->getMarca()->getId());
            $prepareStatement->bindValue(3, $veiculo->getCor()->getId());
            $prepareStatement->bindValue(4, $veiculo->getTipoVeiculo()->getId());
            $prepareStatement->bindValue(5, $veiculo->getPlaca());
            $prepareStatement->bindValue(6, $veiculo->getTipoCombustivel()->getId());
            $prepareStatement->bindValue(7, $veiculo->getTipoEixoVeiculo());
            $prepareStatement->bindValue(8, $veiculo->getCidadao()->getId());
    
            $prepareStatement->execute();
            return 'Cadastrou';
        }
    
        public static function listarVeiculo() {
            $conexao = Conexao::conectar();
            $querySelect = "SELECT v.idVeiculo, v.placaVeiculo, v.tipoEixoVeiculo,
            mv.idModeloVeiculo, mv.nomeModeloVeiculo,
            m.idMarca, m.nomeMarca,
            c.idCor, c.nomeCor,
            tc.idTipoCombustivel, tc.TipoCombustivel,
            tv.idTipoVeiculo, tv.nomeTipoVeiculo,
            cd.idCidadao, cd.nomeCidadao, cd.sobrenomeCidadao, cd.cpfCidadao
        FROM tbVeiculo v
        INNER JOIN tbModeloVeiculo mv ON v.idModeloVeiculo = mv.idModeloVeiculo
        INNER JOIN tbMarca m ON v.idMarca = m.idMarca
        INNER JOIN tbCor c ON v.idCor = c.idCor
        INNER JOIN tbTipoCombustivel tc ON v.idTipoCombustivel = tc.idTipoCombustivel
        INNER JOIN tbTipoVeiculo tv ON v.idTipoVeiculo = tv.idTipoVeiculo
        INNER JOIN tbCidadao cd ON v.idCidadao = cd.idCidadao"
                            ;
                            
    
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
    }
    
                 function consultarDados($veiculo){
                    $conexao = Conexao::conectar();
                    $querySelect = "SELECT idVeiculo, idModelo, idMarca, idCor, idTipoVeiculo, placaVeiculo, tipoCombustivelVeiculo, tipoEixoVeiculo
                                     FROM tbVeiculo WHERE idVeiculo = ".$veiculo->getId();
                    $resultado = $conexao->query($querySelect);
                    $lista = $resultado->fetchAll();
                    foreach ($lista as $p){
                        $veiculo->getMarca($p['Marca']);
                        $veiculo->setModelo($p['Modelo']);
                        $veiculo->setCor($p['Cor']);
                        $veiculo->getTipoVeiculo($p['idTipoVeiculo']);
                        $veiculo->getPlaca($p['PlacaVeiculo']);
                        $veiculo->getTipoCombustivelVeiculo($p['TipoCombustivelVeiculo']);
                        $veiculo->gettipoEixoVeiculo($p['TipoEixoVeiculo']);
                        
                    }
                    return $veiculo;   
                }
        
                 function contar(){
                    $conexao = Conexao::conectar();
                    $querySelect = "SELECT COUNT(idVeiculo) AS qtde FROM tbVeiculo";
                    $resultado = $conexao->query($querySelect);
                    $num = $resultado->fetchAll();
                    foreach ($num as $n)
                        return $n['qtde'];   
                }   
      
?>    