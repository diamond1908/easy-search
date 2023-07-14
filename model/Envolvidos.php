<?php
    class Modelo{
        private $id;
        private $cidadao;
        private $ocorrencia;//
      
        
        public function __construct(){
            $this->cidadao = new Cidadao();
            $this->ocorrencia = new Ocorrencia();

        }
        
        public function getId(){
            return $this->id;
        }
        ////
        public function setId($id){
            $this->id = $id;
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
        public function getOcorrencia(){
            return $this->ocorrencia;
        }
        ////
        public function setocOrrencia($ocorrencia){
            $this->ocorrencia = $ocorrencia;
        }
//////////////////////////////////////////////////////
      
    }
?>