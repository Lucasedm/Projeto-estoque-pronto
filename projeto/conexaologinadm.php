<?php

    $Email_U = $_POST['Email_U'];
    $Senha_U = $_POST['Senha_U'];


    if ($Email_U === 'admin@gmail.com' && $Senha_U === 'admin') {
        header('Location: tabelasadm.php');
    }else{
        echo "Erro na atualização: " . $conn->conectar()->error;
            
    }
