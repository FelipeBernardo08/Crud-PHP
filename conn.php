<?php
    class Conn{
        private $host = 'mysql:host=localhost;dbname=crud_oo';
        private $user = 'root';
        private $pass = '';

        public function conectar(){
            try{
                $pdo = new PDO($this->host, $this->user, $this->pass);
                return $pdo;
            }catch(PDOException $e){
                echo 'Erro ao se conectar ao banco de dados!'.$e->getMessage();
            }
        }
    }
    


?>