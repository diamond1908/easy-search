<?php
    class Conexao
    {
        public static function conectar()
        {
            // $conexao = new PDO("TIPO_BANCO:host=SERVIDOR;dbname=NOME_BANCO", "USUARIO", "SENHA"); 
            $conexao = new PDO("mysql:host=localhost;dbname=bdAplicativo"
                                , "root", ""); 
            //mysqli
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $conexao;
        }
    }
?>