<?php
include_once 'conexao.php';
class produtos {
    private $conn;

    public function __construct() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "stockM";
        $this->conn = mysqli_connect($host, $username, $password, $database);   
    }
    public function regProduto($IDp, $Nome_C, $Nome_P, $Descricao_P, $Preço_Unitario_P, $Quantidade_Estoque_P){
        $query = "INSERT INTO produtos (IDp, Nome_C, Nome_P, Descricao_P, Preço_Unitario_P, Quantidade_Estoque_P) VALUES
        ($IDp, $Nome_C, $Nome_P, $Descricao_P, $Preço_Unitario_P, $Quantidade_Estoque_P)";
        $result = mysqli_query($this->conn, $query);
    }
    public function editProduto($IDp, $Nome_C, $Nome_P, $Descricao_P, $Preço_Unitario_P, $Quantidade_Estoque_P, $Data_Entrada, $Hora_Entrada, $Data_Saida, $Hora_Saida){
        $conecta = new conexaoBanco ();
        $sqlSelect = "SELECT * FROM produtos WHERE IDp = $IDp";
        $result = mysqli_query($this->$conn, $sqlSelect);
    }
    public function exibProd($IDp){
        $sql = "SELECT * FROM produtos";
        $result = mysqli_query($this->conn, $sql);
    }
    public function salvarProd($IDp, $Nome_C, $Nome_P, $Descricao_P, $Preço_Unitario_P, $Quantidade_Estoque_P, $Data_Entrada, $Hora_Entrada, $Data_Saida, $Hora_Saida){
        $conecta = new conexaoBanco ();
        $sqlUpdate = "UPDATE produtos SET Nome_P = '$Nome_P', Nome_C = '$Nome_C', Descricao_P = '$Descricao_p', Quantidade_Estoque_P= '$Quantidade_Estoque_P',
        Data_Entrada = '$Data_Entrada', Hora_Entrada = '$Hora_Entrada', Data_Saida = '$Data_Saida' Hora_saida = '$Hora_Saida' WHERE IDp = '$IDp'";
        $result = mysqli_query($this->$conn, $sqlUpdate);
    }
    public function delProd($IDp){
        $delet = mysqli_query($this->conn->conectar(), "DELETE FROM produtos WHERE IDp = '$IDp'");
        $result = mysqli_query($this->$conn, $delet);
    }

}
