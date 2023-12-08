<?php
include_once 'conexao.php';
include_once 'fornecedores.php';

    $conn = new conexaoBanco();

    $IDf = $_GET['id'];

    $sqlSelect = "SELECT * FROM fornecedores WHERE IDf = $IDf";

    $result = $conn->conectar()->query($sqlSelect);

    if ($result->num_rows > 0) {

        $sqlDelete = "DELETE FROM fornecedores WHERE IDf = $IDf";
        $resultDel = $conn->conectar()->query($sqlDelete);
        }
    header('location: tabelasadm.php');
  
?>