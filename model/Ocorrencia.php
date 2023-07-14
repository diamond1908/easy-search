<?php

require_once ('Cidadao.php');

    class Ocorrencia{
        private $id;
        private $descricao;
        private $data;
        private $objetos;	
        private $cep;
        private $hora;
        private $relato;	
        private $cidadao;
        private $tipo;	

      
        

        
        public function __construct(){
            $this->cidadao = new Cidadao();

        }
        
        public function getId(){
            return $this->id;
        }
        ////
        public function setId($id){
            $this->id = $id;
        }
        //////////////////////////////////////////////////////
        public function getDesc(){
            return $this->descricao;
        }
        ////
        public function setDesc($descricao){
            $this->descricao = $descricao;
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
        public function getRelato(){
            return $this->relato;
        }
        ////
        public function setRelato($relato){
            $this->relato = $relato;
        }

        /////////////////////////////////////////////////////
        public function getObjetos(){
            return $this->objetos;
        }
        ////
        public function setObjetos($objetos){
            $this->objetos = $objetos;
        }


        //////////////////////////////////////////////////////
        public function getTipo(){
            return $this->tipo;
        }
        ////
        public function setTipo($tipo){
            $this->tipo = $tipo;
        }
        //////////////////////////////////////////////////////
        public function getCidadao(){
            return $this->cidadao;
        }
        ////
        public function setCidadao($cidadao){
            $this->cidadao = $cidadao;
        }
        //////////////////////////////////////////////////////
    }

?>       
    