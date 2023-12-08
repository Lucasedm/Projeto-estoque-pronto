<?php
include_once 'conexao.php';
include_once 'produtos.php';

    $usuario = new produtos();
    $conn = new conexaoBanco();

    $IDp = $_GET['id'];

    $sqlSelect = "SELECT * FROM produtos WHERE IDp = $IDp";

    $result = $conn->conectar()->query($sqlSelect);

    if ($result->num_rows > 0) {

        $sqlDelete = "DELETE FROM produtos WHERE IDp = $IDp";
        $resultDel = $conn->conectar()->query($sqlDelete);
        }
    header('location: tabelasadm.php');
  
?>