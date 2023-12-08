<?php
include_once 'conexao.php';
include_once 'usuario.php';
        
        $usuario = new usuario();

        $Nome_U = $_POST['Nome_U'];
        $Email_U = $_POST['Email_U'];
        $Telefone_U = $_POST['Telefone_U'];
        $CPF_CNPJ_U = $_POST['CPF_CNPJ_U'];
        $Senha_U = $_POST['Senha_U'];
        $Nacionalidade = $_POST['Nacionalidade'];

        $usuario->cadastrar($Nome_U, $Email_U, $Telefone_U, $CPF_CNPJ_U, $Senha_U, $Nacionalidade);
        header('Location: Login.html');

?>
