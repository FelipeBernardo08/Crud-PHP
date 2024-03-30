<?php
    session_start();

    require "conn.php";

    require "atribuir.php";

    require "crud.php";

    if(isset($_GET['acao']) && $_GET['acao'] == 'cadastro'){
        $conn = new Conn();

        $atribuir = new Atribuir();
        $atribuir->__set('nome', $_POST['nome']);
        $atribuir->__set('preco', $_POST['preco']);

        $crud = new Crud($conn, $atribuir);
        $crud->create();
    }

    if(isset($_GET['acao']) && $_GET['acao'] == 'alterar'){
        $conn = new Conn();

        $atribuir = new Atribuir();
        $atribuir->__set('id', $_POST['id']);
        $atribuir->__set('nome', $_POST['nome']);
        $atribuir->__set('preco', $_POST['preco']);

        $crud = new Crud($conn, $atribuir);
        $crud->update();
    }

    
    if(isset($_GET['acao']) && $_GET['acao'] == 'apagar'){
        $conn = new Conn();

        $atribuir = new Atribuir();
        $atribuir->__set('id', $_POST['id']);

        $crud = new Crud($conn, $atribuir);
        $crud->delete();
    }

    $conn = new Conn();
    $atribuir = new Atribuir();
    $crud = new Crud($conn, $atribuir);
    $crud->read();
?>