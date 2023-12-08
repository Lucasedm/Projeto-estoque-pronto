<?php
include_once 'conexao.php';
include_once 'categorias.php';

    $conn = new conexaoBanco();
    $connProd = new categorias();

    $Nome_C = $_POST['Nome_C'];
    
    $sqlInsert = "INSERT INTO categorias (Nome_C) VALUES ('$Nome_C')";

    $result = $conn->conectar()->query($sqlInsert);

    if ($result) { 
        header('location: tabelasadm.php');
    } else {
        echo "Erro na atualização: " . $conn->conectar()->error;
    }
?>