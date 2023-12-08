<?php
include_once 'conexao.php';
class fornecedores{
    private $conn;

    public function __construct() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "stockM";
        $this->conn = mysqli_connect($host, $username, $password, $database);
    }
    public function regFornecedor($IDf,	$Nome_F, $Contato_F, $CNPJ_F, $Endereco, $Numero, $CEP, $Cidade, $Estado, $Pais){
        $query = "INSERT INTO fornecedores (IDf, Nome_F, Contato_F, CNPJ_F, Endereco, Numero, CEP, Cidade, Estado, Pais) VALUES
        ($IDf, $Nome_F, $Contato_F, $CNPJ_F, $Endereco, $Numero, $CEP, $Cidade, $Estado, $Pais)";
        $result = mysqli_query($this->$conn, $query);
    }
    public function editFornecedor($IDf, $Nome_F, $Contato_F, $CNPJ_F, $Endereco, $Numero, $CEP, $Cidade, $Estado, $Pais){
        $conecta = new conexaoBanco ();
        $sqlSelect = "SELECT * FROM fornecedores WHERE IDf = $IDf";
        $result = mysqli_query($this->$conn, $sqlSelect);
    }
    public function exibfor($IDf){
        $sql = "SELECT * FROM fornecedores";
        $result = mysqli_query($this->conn, $sql);
    }
    function salvarForn($IDf, $Nome_F, $Contato_F, $CNPJ_F, $Endereco, $Numero, $CEP, $Cidade, $Estado, $Pais){
        $conecta = new conexaoBanco ();
        $sqlUpdate = "UPDATE fornecedores SET Nome_F = '$Nome_F', Contato_F = '$Contato_F', CNPJ_F= '$CNPJ_F', Endereco = '$Endereco',
        Numero = '$Numero', CEP = '$CEP', Cidade = '$Cidade' Estado = '$Estado' Pais = '$Pais' WHERE IDf = '$IDf'";
        $result = mysqli_query($this->$conn, $sqlUpdate);
    }
    function delForn($IDf){
        $delet = mysqli_query($this->conn->conectar(), "DELETE FROM fornecedores WHERE IDf = '$IDf' ");
        $result = mysqli_query($this->$conn, $delet);
    }
}