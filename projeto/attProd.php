<?php
include_once 'conexao.php';
include_once 'produtos.php';

    $conn = new conexaoBanco();

    $IDp = $_POST['id'];
    $nomeP = $_POST['Nome_P'];
    $nomeC  = $_POST['Nome_C'];
    $descP = $_POST['Descricao_P'];
    $prUnit = $_POST['Preco_Unitario_P'];
    $quantidade = $_POST['Quantidade_Estoque_P'];
    
    $sqlUpdate = "UPDATE produtos SET Nome_P='$nomeP', Nome_C='$nomeC', Descricao_P='$descP', Preco_Unitario_P = '$prUnit', Quantidade_Estoque_P = '$quantidade' WHERE IDp = '$IDp'";

    $result = $conn->conectar()->query($sqlUpdate);

    if ($result) { 
        header('location: tabelas.php');
    } else {
        echo "Erro na atualização: " . $conn->conectar()->error;
    }
?>

