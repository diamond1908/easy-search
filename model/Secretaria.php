<?php
    class Secretaria{
        private $id;
        private $senha;//
        private $email ;//	
        private $logradouro ;//	
        private $numLog ; //	
        private $cep ;	//
        private $bairro ;//	
        private $cidade ;//
      
        

        
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
        public function getEmail(){
            return $this->email;
        }
        ////
        public function setEmail($email){
            $this->email = $email;
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
        //////////////////////////////////////////////////////
    }
?>