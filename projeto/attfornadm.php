<?php
include_once 'conexao.php';
include_once 'fornecedores.php';
    
    $conn = new conexaoBanco();
    $fornecedores = new fornecedores();
    
    $IDf = $_POST['id'];
    $Nome_F = $_POST['Nome_F']; 
    $Contato_F = $_POST['Contato_F'];
    $CNPJ_F = $_POST['CNPJ_F'];
    $Endereco = $_POST['Endereco'];
    $Numero = $_POST['Numero'];
    $CEP = $_POST['CEP'];
    
    $sqlUpdate = "UPDATE fornecedores SET Nome_F='$Nome_F', Contato_F='$Contato_F', CNPJ_F='$CNPJ_F', Endereco = '$Endereco', Numero = '$Numero', CEP = '$CEP' WHERE IDf = '$IDf'";

    $result = $conn->conectar()->query($sqlUpdate);

    if ($result) { 
        header('location: tabelasadm.php');
    } else {
        echo "Erro na atualização: " . $conn->conectar()->error;
    }
?>