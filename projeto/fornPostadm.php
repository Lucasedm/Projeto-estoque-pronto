<?php
include_once 'conexao.php';
include_once 'fornecedores.php';

    $conn = new conexaoBanco();
    $fornecedores = new fornecedores();

    $Nome_F = $_POST['Nome_F']; 
    $Contato_F = $_POST['Contato_F'];
    $CNPJ_F = $_POST['CNPJ_F'];
    $Endereco = $_POST['Endereco'];
    $Numero = $_POST['Numero'];
    $CEP = $_POST['CEP'];


    $sqlInsert = "INSERT INTO fornecedores (Nome_F, Contato_F, CNPJ_F, Endereco, Numero, CEP) 
    VALUES ('$Nome_F','$Contato_F','$CNPJ_F','$Endereco','$Numero','$CEP')";

    $result = $conn->conectar()->query($sqlInsert);

    if ($result) { 
        header('location: tabelasadm.php');
    } else {
        echo "Erro na atualização: " . $conn->conectar()->error;
    }