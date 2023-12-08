<?php
include_once 'conexao.php';
class categorias{
    private $conn;

    public function __construct() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "stockM";
        $this->conn = mysqli_connect($host, $username, $password, $database);
    }
    public function regCategorias($IDc, $Nome_C){
        $query = "INSERT INTO categorias (IDc, Nome_C) VALUES ($IDc, $Nome_C)";
        $result = mysqli_query($this->$conn, $query);
    }
    public function editCategorias($IDc){
        $conecta = new conexaoBanco ();
        $sqlSelect = "SELECT * FROM categorias WHERE IDc = $IDc";
        $result = mysqli_query($this->$conn, $sqlSelect);
    }
    public function exibCat($IDc){
        $sql = "SELECT * FROM categorias";
        $result = mysqli_query($this->conn, $sql);   
    }
    function salvarCat($IDc, $Nome_C){
        $conecta = new conexaoBanco ();
        $sqlUpdate = "UPDATE categorias SET Nome_C = '$Nome_C', WHERE IDc = '$IDc'";
        $result = mysqli_query($this->$conn, $sqlUpdate);
    }
    function delCat($IDc){
        $delet = mysqli_query($this->conn->conectar(), "DELETE FROM categorias WHERE IDc = '$IDc'");
        $result = mysqli_query($this->$conn, $delet);
    }
}

?>
