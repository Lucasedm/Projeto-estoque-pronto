<?php
    include_once 'conexao.php';
    include_once 'usuario.php';
    session_start();

        $Email_U = $_POST['Email_U'];
        $Senha_U = $_POST['Senha_U'];

        $conn = new conexaoBanco();
        $usu = new usuario();

        $usu->logar($Email_U, $Senha_U);

        if($usu->logar($Email_U, $Senha_U)){
            echo '<script>alert("Login realizado com sucesso!")</script>';
            header('Location: tabelas.php');

        }else{
            echo '<script>alert("Erro ao realizar o login!")</script>';
            echo "Erro na atualização: " . $conn->conectar()->error;
        }
?>