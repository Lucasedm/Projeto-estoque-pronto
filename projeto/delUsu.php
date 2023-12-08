<?php
include_once 'conexao.php';
include_once 'usuario.php';

    $usuario = new usuario();
    $conn = new conexaoBanco();

    $IDu = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuarios WHERE IDu = $IDu";

    $result = $conn->conectar()->query($sqlSelect);

    if ($result->num_rows > 0) {

        $sqlDelete = "DELETE FROM usuarios WHERE IDu = $IDu";
        $resultDel = $conn->conectar()->query($sqlDelete);
        }
    header('location: tabelasadm.php');
  
?>