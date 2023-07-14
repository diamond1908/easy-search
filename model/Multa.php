<?php

require_once ('Veiculo.php');

    class Multa{
        private $id;
        private $motivo;
        private $valor;
        private $hora;	
        private $data;
        private $cep;
        private $Log;	
        private $bairro;
        private $cidade;
        private $Veiculo;	

      


        
        public function __construct(){
            $this->Veiculo = new Veiculo();

        }
        
        public function getId(){
            return $this->id;
        }
        ////
        public function setId($id){
            $this->id = $id;
        }
        //////////////////////////////////////////////////////
        public function getMotivo(){
            return $this->motivo;
        }
        ////
        public function setMotivo($motivo){
            $this->motivo = $motivo;
        }
        //////////////////////////////////////////////////////        
        public function getData(){
            return $this->data;
        }
        ////
        public function setData($data){
            $this->data = $data;
        }

        //////////////////////////////////////////////////////
        public function getHora(){
            return $this->hora;
        }
        ////
        public function setHora($hora){
            $this->hora = $hora;
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
        public function getValor(){
            return $this->valor;
        }
        ////
        public function setValor($valor){
            $this->valor = $valor;
        }

        /////////////////////////////////////////////////////
        public function getLog(){
            return $this->Log;
        }
        ////
        public function setLog($Log){
            $this->Log = $Log;
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
        public function getVeiculo(){
            return $this->Veiculo;
        }
        ////
        public function setVeiculo($Veiculo){
            $this->Veiculo = $Veiculo;
        }
        //////////////////////////////////////////////////////
    }

?>       
    