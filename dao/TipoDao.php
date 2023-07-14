<?php
  require_once '../model/Conexao.php';

  class TipoDao{


      public static function listarTipoOcorrencia(){                        
          $conexao = Conexao::conectar();
          $querySelect = "SELECT idTipoOcorrencia, nomeOcorrencia FROM tbTipoOcorrencia";
          $resultado = $conexao->query($querySelect);
          $lista = $resultado->fetchAll();
          return $lista;   
      }
  }


?>