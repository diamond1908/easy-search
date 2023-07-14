<?php

// Todas as partes da API podem acessar o arquivo;
header('Access-Control-Allow-Orgin: *');

/* um cabeçalho que, quando definido como true,
 instruido os navegadores a export a resposta ao codigo javascript do 
 front-end. As crendenciais consistem em cookies, cabeçalhos de autorizção*/
header('Access-Control-Allow-Credentials: true');

/*é o que meu sistema ionic vai poder fazer, post= informação,
get= recupera as informações, opções= configurações.*/ 
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
//tipo de conteudo aplicado através do json, utf-8 aceita qualquer caractere//
header('Content-Type: application/json; charset=utf-8'); 

//Endereço do banco de dados
$hostname = 'localhost';
//Nome do banco
$database = 'bdAplicativo';
//usuario = variavel
$username = 'root';
//Senha do banco tbm é uma variavel
$password = '';

///////////////////////////////////////////////////////

// Tentar também é um comando
try{
//conexão é uma variavel que vai conectar como o banco de dados.
$conexao = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
//O ob_clean é um registro de saida que é limpo automaticamente quando o PHP termina de executar.
ob_clean();
// catch = pegar o erro, caso try não executeecho 'Conexão realizada com sucesso!!';
echo 'Conexão Feita com sucesso!!';
} catch(PDOException $e) {
    echo $e->getMessage();
    echo 'Conexão  com Problemas!!!';
}

?>