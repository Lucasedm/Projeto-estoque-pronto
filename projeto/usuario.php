<?php
include_once 'conexao.php';
class usuario {
    public $conn;

    public function __construct() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "stockM";
        $this->conn = mysqli_connect($host, $username, $password, $database);
    }

    public function cadastrar($Nome_U, $Email_U, $Telefone_U, $CPF_CNPJ_U, $Senha_U, $Nacionalidade) {
        $query = "INSERT INTO usuarios (Nome_U, Email_U, Telefone_U, CPF_CNPJ_U, Senha_U, Nacionalidade) VALUES 
        ('$Nome_U','$Email_U','$Telefone_U','$CPF_CNPJ_U','$Senha_U','$Nacionalidade')";
        $result = mysqli_query($this->conn, $query);
        if($result === true){
            header('Location: Login.html');
        }
        else{
            echo 'Não foi possível realizar o login';
        }

    }

    public function logar($Email_U, $Senha_U){
        $sql = "SELECT * FROM usuarios WHERE Email_U =  '$Email_U' and Senha_U = '$Senha_U'";
        $result = mysqli_query($this->conn, $sql);

        session_start();

        if(mysqli_num_rows($result) < 1)
        {

            unset($_SESSION['Email_U']);
            unset($_SESSION['Senha_U']);
            header('Location: Login.html');
        }
        else
        {
            $_SESSION['Email_U'] = $Email_U;
            $_SESSION['Senha_U'] = $Senha_U;
            header('Location: tabelas.php');
        }
    }
    function Deletar($logado){
        $delet = mysqli_query($this->conn->conectar(), "DELETE FROM usuarios WHERE Email_U = '$logado'");
    }
    function Sair(){
        session_start();
        unset($_SESSION['Email_U']);
        unset($_SESSION['Senha_U']);
        header('location: Login.html');
    }
    function exibUsu($IDu){
        $sqlSelect = "SELECT * FROM usuarios";
        $result = mysqli_query($this->conn, $sqlSelect);
        return $result;
    }
    function salvarEdit($IDu, $nome, $email, $telefone, $cnpj, $senha, $nacio){
        $sqlUpdate = "UPDATE usuarios SET Nome_U='$nome', Email_U='$email', Telefone_U='$telefone', CPF_CNPJ_U='$cnpj', Senha_U='$senha', Nacionalidade='$nacio' WHERE id = '$IDu'";
        $result = mysqli_query($this->conn, $sqlUpdate);
    }
}

?>