<?php   
    include_once "conexao.php";
    include_once "produtos.php";
    include_once "fornecedores.php";
    include_once "categorias.php";

    session_start();
    $logado = $_SESSION['Email_U'];

    $conn = new conexaoBanco();
    $sqlProd = "SELECT * FROM produtos";
    $sqlCat = "SELECT * FROM categorias";
    $sqlFor = "SELECT * FROM fornecedores";


    $resuProd = $conn->conectar()->query($sqlProd);
    $resuCat = $conn->conectar()->query($sqlCat);
    $resuFor = $conn->conectar()->query($sqlFor);


    $connProd = new produtos();
    $connCat = new categorias();
    $connFor = new fornecedores();

    $connProd->exibProd($sqlProd);
    $connCat->exibCat($sqlCat);
    $connFor->exibfor($sqlFor);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tabelas.css">
    <title>Tabelas StockMaster</title>
</head>

<style>
    .tabconteudo1,
    .tabconteudo2,
    .tabconteudo3, {
        display: none;
    }

</style>

<body>

    <nav class="nav">
        <div class="Logo">
            <img src="imagens/caixa.png">
            <p>StockMaster<p>
        </div>
        <div class="item">            
        <?php
                echo "<p> Bem vindo <u>$logado</u></p>"; 
            ?>
        </div>
    </nav>

    <nav class="nav-menu">
        <nav class="menu">  
            <input type="checkbox" class="menu-faketrigger"/>
            <div class="menu-lines">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <p class="td">Todos</p>

            <ul>
                <li><a href="Index.html">Home</a></li>
                <li><a href="Login.html">Login</a></li>
                <li><a href="Cadastro.html">Cadastro</a></li>
                <li><a href="">Tabelas</a></li>
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </nav>

        <ul>
            <a class="tabs1" href="#tab1" onclick="abrirTabela('tab1')">Produtos</a>
            <a class="tabs2" href="#tab2" onclick="abrirTabela('tab2')">Categorias</a>
            <a class="tabs4" href="#tab4" onclick="abrirTabela('tab3')">Fornecedores</a>     
        </ul>
    </nav>
    
    <div class = "area-tab">
        <div class = "tabconteudo1" id = "tab1">
            <button class ="botao" href ="insProd.html">inserir produtos</button>
            <table>
                <thead>
                    <tr>
                        <th>ID do produto</th>
                        <th>Nome do produto</th>
                        <th>Categoria</th>
                        <th>Descrição</th>
                        <th>Preço Unitário</th>
                        <th>Quantidade em estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            <tbody>
            <?php
                    if($resuProd -> num_rows > 0){
                        while($data = mysqli_fetch_assoc($resuProd)){
        
                            $IDp = $data['IDp'];
                            $nomeC = $data['Nome_P'];
                            $nomeP = $data['Nome_C'];
                            $descP = $data['Descricao_P'];
                            $prUnit = $data['Preco_Unitario_P'];
                            $quantidade = $data['Quantidade_Estoque_P'];


                            echo "<tr>";
                            echo "<td> $IDp </td>";
                            echo "<td> $nomeC </td>";
                            echo "<td> $nomeP </td>";
                            echo "<td> $descP </td>";
                            echo "<td> $prUnit </td>";
                            echo "<td> $quantidade </td>";
                            echo "<td> 
                                <a class ='botaoEdit' href='editprod.php?id=$IDp'>Editar</a>
                                </td>;";
                            echo "</tr>";
                    }
                }
                ?>
            </tbody>
            </table>
        </div>
    
        <div class = "tabconteudo2" id = "tab2">
            <button class ="botao" href = "inscat.html">inserir categorias</button>
            <table>
                <thead>
                    <tr>
                        <th>ID da categoria</th>
                        <th>Nome da categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            <tbody>
            <?php
                    if($resuCat -> num_rows > 0){
                        while($data = mysqli_fetch_assoc($resuCat)){
        
                            $IDc = $data['IDc'];
                            $nomeC = $data['Nome_C'];

                            echo "<tr>";
                            echo "<td> $IDc </td>";
                            echo "<td> $nomeC </td>";
                            echo "<td> 
                                    <a class ='botaoEdit' href='editcat.php?id=$IDc'>Editar</a>
                                </td>";
                            echo "</tr>";
                    }
                }
                ?>
            </tbody>
            </table>
        </div>
    
        <div class = "tabconteudo3" id = "tab3">
            <button class = "botao" href = "insforn.html">inserir fornecedores</button>
            <table>
                <thead>
                    <tr>
                        <th>ID Fornecedores</th>
                        <th>Nome fornecedores</th>
                        <th>Contato fornecedores</th>
                        <th>CNPJ fornecedores</th>
                        <th>Endereço fornecedores</th>
                        <th>Número fornecedores</th>
                        <th>CEP fornecedores</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            <tbody>
                <?php
                    if($resuFor -> num_rows > 0){
                        while($data = mysqli_fetch_assoc($resuFor)){
        
                            $IDf = $data['IDf'];
                            $nomeFor = $data['Nome_F'];
                            $contFor = $data['Contato_F'];
                            $cnpj = $data['CNPJ_F'];
                            $endereco = $data['Endereco'];
                            $numero = $data['Numero'];
                            $cep = $data['CEP'];


                            echo "<tr>";
                            echo "<td> $IDf </td>";
                            echo "<td> $nomeFor </td>";
                            echo "<td> $contFor </td>";
                            echo "<td> $cnpj </td>";
                            echo "<td> $endereco </td>";
                            echo "<td> $numero </td>";
                            echo "<td> $cep </td>";
                            echo "<td> 
                            <a class ='botaoEdit' href='editforn.php?id=$IDf'>Editar</a>
                                </td>;";
                            echo "</tr>";
                    }
                }
                ?>
            </tbody> 
            </table>
        </div> 
        
</div>
    <script>
        function abrirTabela(tabId) {
            var tabs = document.querySelectorAll('.tabconteudo1, .tabconteudo2, .tabconteudo3');
            tabs.forEach(function(tab) {
                tab.style.display = 'none';
            });

            var tab = document.getElementById(tabId);
            tab.style.display = 'block';
        }
        abrirTabela('tab1');
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.botao').click(function () {
                var link = $(this).attr('href');
                window.open(link, '_blank');
            });
        });
    </script>
</body>
</html>