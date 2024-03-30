<?php
    class Atribuir{
        private $id;
        private $nome;
        private $preco;

        public function __set($variavel, $valor){
            $this->$variavel = $valor;
        }

        public function __get($variavel){
            return $this->$variavel;
        }
    }

?>