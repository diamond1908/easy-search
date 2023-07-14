<?php   
    
    require_once 'Cor.php';
    require_once 'Modelo.php';
    require_once 'Marca.php';
    require_once 'TipoVeiculo.php';
    require_once 'TipoCombustivel.php';
    require_once 'Cidadao.php';
    

    class Veiculo{
        private $id;
        private $marca;
        private $modelo;
        private $tipoVeiculo;
        private $placa;
        private $cor;
        private $tipoCombustivel;
        private $tipoEixoVeiculo;
        private $cidadao;

        public function __construct(){
            $this->cor = new Cor();
            $this->modelo = new Modelo();
            $this->marca = new Marca();
            $this->tipoVeiculo = new TipoVeiculo();
            $this->tipoCombustivel = new TipoCombustivel();
            $this->cidadao = new Cidadao();

        }

        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }

        public function setMarca($marca){
            $this->marca = $marca;
        }
        public function getMarca(){
            return $this->marca;
        }

        public function setModelo($modelo){
            $this->modelo = $modelo;
        }
        public function getModelo(){
            return $this->modelo;
        }

        public function setTipoVeiculo($tipoVeiculo){
            $this->tipoVeiculo = $tipoVeiculo;
        }
        public function getTipoVeiculo(){
            return $this->tipoVeiculo;
        }

        public function setPlaca($placa){
            $this->placa = $placa;
        }
        public function getPlaca(){
            return $this->placa;
        }

        public function getCor(){
            return $this->cor;
        }
        public function setCor($cor){
            $this->cor = $cor;
        }

        public function getTipoCombustivel(){
            return $this->tipoCombustivel;
        }
        public function setTipoCombustivel($tipoCombustivel){
            $this->tipoCombustivel = $tipoCombustivel;
        }
        
        public function getTipoEixoVeiculo(){
            return $this->tipoEixoVeiculo;
        }
        public function setTipoEixoVeiculo($tipoEixoVeiculo){
            $this->tipoEixoVeiculo = $tipoEixoVeiculo;
        }

        public function setCidadao($cidadao){
            $this->cidadao = $cidadao;
        }
        public function getCidadao(){
            return $this->cidadao;
        }
    }
?>