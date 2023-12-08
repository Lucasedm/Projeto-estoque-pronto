<?php
include_once 'conexao.php';
include_once 'categorias.php';

    $conn = new conexaoBanco();

    $IDc = $_POST['id'];
    $nomeC  = $_POST['Nome_C'];
 
    $sqlUpdate = "UPDATE categorias SET Nome_C='$nomeC' WHERE IDc = '$IDc'";

    $result = $conn->conectar()->query($sqlUpdate);

    if ($result) { 
        header('location: tabelasadm.php');
    } else {
        echo "Erro na atualização: " . $conn->conectar()->error;
    }
?>
