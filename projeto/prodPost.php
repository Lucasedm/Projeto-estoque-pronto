<?php
include_once 'conexao.php';
include_once 'produtos.php';

    $conn = new conexaoBanco();
    $connProd = new produtos();

    $Nome_P = $_POST['Nome_P'];
    $Nome_C = $_POST['Nome_C'];
    $Descricao_P = $_POST['Descricao_P'];
    $Preço_Unitario_P = $_POST['Preco_Unitario_P'];
    $Quantidade_Estoque_P = $_POST['Quantidade_Estoque_P'];

    $sqlInsert = "INSERT INTO produtos ( Nome_C, Nome_P, Descricao_P, Preco_Unitario_P, Quantidade_Estoque_P) VALUES ('$Nome_C', '$Nome_P', '$Descricao_P', '$Preço_Unitario_P', '$Quantidade_Estoque_P')";

    $result = $conn->conectar()->query($sqlInsert);

    if ($result) { 
        header('location: tabelas.php');
    } else {
        echo "Erro na atualização: " . $conn->conectar()->error;
    }
?>
