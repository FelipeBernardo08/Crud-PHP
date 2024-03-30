<?php
    class Crud{
        private $conn;
        private $atribuir;

        public function __construct(Conn $conn, Atribuir $atribuir){
            $this->conn = $conn->conectar();
            $this->atribuir = $atribuir;
        }

        public function create(){
            try{
                $query = '
                insert into produtos (nome, valor) 
                values (:nome, :valor)
                ';
                $stmt = $this->conn->prepare($query);
                $stmt->bindValue(':nome', $this->atribuir->__get('nome'));
                $stmt->bindValue(':valor', $this->atribuir->__get('preco'));
                $stmt->execute();

                header ('Location: index.php?cadastro=ok');
            }catch(PDOException $e){
                echo 'erro ao cadastrar dados'.$e->getMessage();
            }
        }

        public function read(){
            try{
                $query = '
                    select * from produtos
                ';
                $stmt = $this->conn->prepare($query);
                $stmt->execute();

                if($stmt->rowCount() > 0){
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        $data[] = $row;
                    }
                }

                $_SESSION['dados'] = $data;

            }catch(PDOException $e){
                echo 'Erro ao recuperar dados!<br>'.$e->getMessage();
            }
        }

        public function update(){
            try{
                $query = '
                    update produtos set nome = :nome, valor = :valor where id = :id
                ';
                $stmt = $this->conn->prepare($query);
                $stmt->bindValue(':id', $this->atribuir->__get('id'));
                $stmt->bindValue(':nome', $this->atribuir->__get('nome'));
                $stmt->bindValue(':valor', $this->atribuir->__get('preco'));

                $stmt->execute();

                header('Location: index.php?update=ok');
            }catch(PDOException $e){
                echo 'Erro ao atualizar dados!'.$e->getMessage();
            }
        }

        public function delete(){
            try{
                $query = '
                    delete from produtos where id = :id
                ';
                $stmt = $this->conn->prepare($query);
                $stmt->bindValue(':id', $this->atribuir->__get('id'));

                $stmt->execute();

                header('Location: index.php?delete=ok');
            }catch(PDOException $e){
                echo 'Erro ao deletar dados!<br>'.$e->getMessage();
            }
        }

        
    }

?>