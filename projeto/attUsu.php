<?php
include_once 'conexao.php';
include_once 'usuario.php';

    $conn = new conexaoBanco();
    $connUsu = new usuario();

    $IDu = $_POST['id'];
    $nome = $_POST['Nome_U'];
    $email = $_POST['Email_U'];
    $telefone = $_POST['Telefone_U'];
    $cnpj = $_POST['CPF_CNPJ_U'];
    $senha = $_POST['Senha_U'];
    $nacio = $_POST['Nacionalidade'];
    
    $sqlUpdate = "UPDATE usuarios SET Nome_U='$nome', Email_U='$email', Telefone_U='$telefone', CPF_CNPJ_U='$cnpj', Senha_U='$senha', Nacionalidade='$nacio' WHERE IDu = '$IDu'";

    $result = $conn->conectar()->query($sqlUpdate);

    if ($result) { 
        header('location: tabelasadm.php');
    } else {
        echo "Erro na atualização: " . $conn->conectar()->error;
    }
?>
