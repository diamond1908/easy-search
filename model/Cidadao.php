<?php
    class Cidadao{
        private $id;
        private $senha;//
        private $nome;
        private $logradouro ;//	
        private $numLog ; //	
        private $cep ;	//
        private $bairro ;//	
        private $cidade ;//
        private $sobrenome;//
        private $cpf;//
        private $genero;//
        private $complemento;//
        private $email;//
        private $idade;//
        private $situacao;

        
  
        
        public function getId(){
            return $this->id;
        }
        ////
        public function setId($id){
            $this->id = $id;
        }
        //////////////////////////////////////////////////////
        public function getSenha(){
            return $this->senha;
        }
        ////
        public function setSenha($senha){
            $this->senha = $senha;
        }
        //////////////////////////////////////////////////////        
        public function getNome(){
            return $this->nome;
        }
        ////
        public function setNome($nome){
            $this->nome = $nome;
        }
        //////////////////////////////////////////////////////
        public function getLogradouro(){
            return $this->logradouro;
        }
        ////
        public function setLogradouro($logradouro){
            $this->logradouro = $logradouro;
        }
        //////////////////////////////////////////////////////
        public function getNumLog(){
            return $this->numLog;
        }
        ////
        public function setNumLog($numLog){
            $this->numLog = $numLog;
        }
        //////////////////////////////////////////////////////
        public function getCep(){
            return $this->cep;
        }
        ////
        public function setCep($cep){
            $this->cep = $cep;
        }
        //////////////////////////////////////////////////////
        public function getBairro(){
            return $this->bairro;
        }
        ////
        public function setBairro($bairro){
            $this->bairro = $bairro;
        }
        //////////////////////////////////////////////////////
        public function getCidade(){
            return $this->cidade;
        }
        ////
        public function setCidade($cidade){
            $this->cidade = $cidade;
        }
        /////////////////////////////////////////////////////
        public function getSobrenome(){
            return $this->sobrenome;
        }
        ////
        public function setSobrenome($sobrenome){
            $this->sobrenome = $sobrenome;
        }
        //////////////////////////////////////////////////////
        public function getCpf(){
            return $this->cpf;
        }
        ////
        public function setCpf($cpf){
            $this->cpf = $cpf;
        }
        //////////////////////////////////////////////////////
        public function getGenero(){
            return $this->genero;
        }
        ////
        public function setGenero($genero){
            $this->genero = $genero;
        }
        //////////////////////////////////////////////////////
        public function getComplemento(){
            return $this->complemento;
        }
        ////
        public function setComplemento($complemento){
            $this->complemento = $complemento;
        }
        //////////////////////////////////////////////////////
        public function getIdade(){
            return $this->idade;
        }
        ////
        public function setIdade($idade){
            $this->idade = $idade;
        }
        //////////////////////////////////////////////////////
        public function getEmail(){
            return $this->email;
        }
        ////
        public function setEmail($email){
            $this->email = $email;
        }
        //////////////////////////////////////////////////////
        public function getSituacao(){
            return $this->situacao;
        }
        ////
        public function setSituacao($situacao){
            $this->situacao = $situacao;
        }
    }
?>