<?php   
    require "admin.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        input{
            width: 80%;
        }

        .after{
            display: none;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <section class="container">
        <div class="row">

            <div id="create" class="text-center bg-success text-light after mt-2">
                <h4>Dados cadastrados com sucesso!</h4>
            </div>

            <div id="update" class="text-center bg-warning text-light after mt-2">
                <h4>Dados atualizados com sucesso!</h4>
            </div>

            <div id="delete" class="text-center bg-danger text-light after mt-2">
                <h4>Dados apagados com sucesso!</h4>
            </div>
            <div class="col-6">
                
                <div class="card mt-3">
                    <div class="card-header text-center">
                        <h4>Cadastro de produtos</h4>
                    </div>

                    <div class="card-body">
                        <p>Digite os dados para cadastrar os produtos:</p>
                        <form action="admin.php?acao=cadastro" method="POST">
                            <p>Nome: </p>
                            <input type="text"  class="form-control" name="nome" placeholder="Digite o nome do produto" required>
                            <p>Valor: </p>
                            <input type="text"  class="form-control" name="preco" placeholder="Digite o valor do produto" required>
                            <br>
                            <button class="btn btn-sm btn-success" type="submit">Cadastrar</button>
                        </form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header text-center">
                        <h4>Atualizar cadastro</h4>
                    </div>

                    <div class="card-body">
                        <p>Digite os dados para atualizar cadastro:</p>
                        <form action="admin.php?acao=alterar" method="post">
                            <p>I.D:</p> <input type="text"  class="form-control" name="id" placeholder="Digite o I.D">
                            <p>Nome:</p> <input type="text"  class="form-control" name="nome" placeholder="Digite o nome do produto" required>
                            <p>Valor:</p> <input type="text"  class="form-control" name="preco" placeholder="Digite o valor do produto" required>
                            <br>
                            <button class="btn btn-sm btn-warning" type="submit">Atualizar</button>
                        </form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header text-center">
                        <h4>Apagar cadastro</h4>
                    </div>

                    <div class="card-body">
                        <p>Digite os dados para apagar cadastro:</p>
                        <form action="admin.php?acao=apagar" method="post">
                            <p>I.D: </p><input type="text"  class="form-control" name="id" placeholder="Digite o I.D">
                            <br>
                            <button class="btn btn-sm btn-danger" type="submit">Apagar</button>
                        </form>
                    </div>
                </div>


            </div>
            
            <div class="col-6 mt-3"> 
                <div class="text-center">
                    <h4>Produtos Cadastrados</h4>
                </div>
                <?php
                    // foreach($_SESSION['dados'] as $row){
                    //     echo '
                    //         <p>ID: '.$row['id'].'</p>
                    //         <p>Nome: '.$row['nome'].'</p>
                    //         <p>Valor: R$'.$row['valor'].',00</p>
                    //         <hr>
                    //     ';
                    // }
                ?>
                <table class="table table-striped">
                        <thead>
                            <th>ID</th><th>Nome</th><th>Valor</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($_SESSION['dados'] as $row){
                                    echo '<tr>
                                        <td>'.$row['id'].'</td>
                                        <td>'.$row['nome'].'</td>
                                        <td>R$'.$row['valor'].',00</td>
                                        </tr>
                                    ';
                                }
                            ?>
                        </tbody>
                
                </table>
            </div>
        </div>
    </section>

    <script>
        let url = window.location.href
        console.log(url)
        
        if(url == 'http://localhost/felipe/index.php?cadastro=ok'){
            let change = document.getElementById('create')
            change.classList.remove('after')
        }

        if(url == 'http://localhost/felipe/index.php?update=ok'){
            let change = document.getElementById('update')
            change.classList.remove('after')
        }

        if(url == 'http://localhost/felipe/index.php?delete=ok'){
            let change = document.getElementById('delete')
            change.classList.remove('after')
        }
    </script>
</body>
</html>