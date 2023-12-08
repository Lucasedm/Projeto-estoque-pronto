<?php
include_once 'conexao.php';
include_once 'categorias.php';

    $usuario = new categorias();
    $conn = new conexaoBanco();

    $IDc = $_GET['id'];

    $sqlSelect = "SELECT * FROM categorias WHERE IDc = $IDc";

    $result = $conn->conectar()->query($sqlSelect);

    if ($result->num_rows > 0) {

        $sqlDelete = "DELETE FROM categorias WHERE IDc = $IDc";
        $resultDel = $conn->conectar()->query($sqlDelete);
        }
    header('location: tabelasadm.php');
  
?>