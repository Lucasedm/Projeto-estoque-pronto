<?php   
    include_once "conexao.php";
    include_once "usuario.php";
    include_once "produtos.php";
    include_once "fornecedores.php";
    include_once "categorias.php";

    $conn = new conexaoBanco();
    $sqlUsu = "SELECT * FROM usuarios";
    $sqlProd = "SELECT * FROM produtos";
    $sqlCat = "SELECT * FROM categorias";
    $sqlFor = "SELECT * FROM fornecedores";


    $resuUsu = $conn->conectar()->query($sqlUsu);
    $resuProd = $conn->conectar()->query($sqlProd);
    $resuCat = $conn->conectar()->query($sqlCat);
    $resuFor = $conn->conectar()->query($sqlFor);


    $connUsu = new usuario();
    $connProd = new produtos();
    $connCat = new categorias();
    $connFor = new fornecedores();

    $connUsu->exibUsu($sqlUsu);
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
    .tabconteudo3,
    .tabconteudo4, {
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
                <p> Bem vindo <u>Admin</u></p>"; 
            
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
                <li><a href="Index.html">Sair</a></li>
            </ul>
        </nav>

        <ul>
            <a class="tabs1" href="#tab1" onclick="abrirTabela('tab1')">Produtos</a>
            <a class="tabs2" href="#tab2" onclick="abrirTabela('tab2')">Categorias</a>
            <a class="tabs4" href="#tab4" onclick="abrirTabela('tab3')">Fornecedores</a>     
            <a class="tabs6" href="#tab6" onclick="abrirTabela('tab4')">Usuários</a>
        </ul>
    </nav>
    
    <div class = "area-tab">
        <div class = "tabconteudo1" id = "tab1">
            <button class ="botao" href ="insProdadm.html">inserir produtos</button>
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
                                <a class ='botaoEdit' href='editprodadm.php?id=$IDp'>Editar</a>
                                <a class ='botaoex' href='delprod.php?id=$IDp'>Excluir</a>
                                </td>;";
                            echo "</tr>";
                    }
                }
                ?>
            </tbody>
            </table>
        </div>
    
        <div class = "tabconteudo2" id = "tab2">
            <button class ="botao" href = "inscatadm.html">inserir categorias</button>
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
                                    <a class ='botaoEdit' href='editcatadm.php?id=$IDc'>Editar</a>
                                    <a class ='botaoex' href='delcat.php?id=$IDc'>Excluir</a>
                                </td>";
                            echo "</tr>";
                    }
                }
                ?>
            </tbody>
            </table>
        </div>
    
        <div class = "tabconteudo3" id = "tab3">
            <button class = "botao" href = "insfornadm.html">inserir fornecedores</button>
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
                            <a class ='botaoEdit' href='editfornadm.php?id=$IDf'>Editar</a>
                            <a class ='botaoex' href='delforn.php?id=$IDf'>Excluir</a>
                                </td>;";
                            echo "</tr>";
                    }
                }
                ?>
            </tbody> 
            </table>
        </div>


        <div class = "tabconteudo4" id = "tab4">
            <table>
                <thead>
                    <tr>
                        <th>ID do usuário</th>
                        <th>Nome</th>
                        <th>email</th>
                        <th>telefone</th>
                        <th>cnpj</th>
                        <th>senha</th>
                        <th>nacionalidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
            <tbody class="tabela-dados">
                <?php
                    if($resuUsu -> num_rows > 0){
                        while($data = mysqli_fetch_assoc($resuUsu)){
        
                            $IDu = $data['IDu'];
                            $nome = $data['Nome_U'];
                            $email = $data['Email_U'];
                            $telefone = $data['Telefone_U'];
                            $cpf = $data['CPF_CNPJ_U'];
                            $senha = $data['Senha_U'];
                            $nacionalidade = $data['Nacionalidade'];

                            echo "<tr>";
                            echo "<td> $IDu </td>";
                            echo "<td> $nome </td>";
                            echo "<td> $email </td>";
                            echo "<td> $telefone </td>";
                            echo "<td> $cpf </td>";
                            echo "<td> $senha </td>";
                            echo "<td> $nacionalidade</td>";
                            echo "<td> 
                                <a class ='botaoEdit' href='editUsu.php?id=$IDu'>Editar</a>
                                <a class ='botaoex' href='delUsu.php?id=$IDu'>Excluir</a>
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
            var tabs = document.querySelectorAll('.tabconteudo1, .tabconteudo2, .tabconteudo3, .tabconteudo4');
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