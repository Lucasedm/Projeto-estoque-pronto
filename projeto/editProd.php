<?php
include_once 'conexao.php';
include_once 'produtos.php';

    $produtos = new produtos();
    $conn = new conexaoBanco();

    $IDp = $_GET['id'];

    $sqlSelect = "SELECT * FROM produtos WHERE IDp = $IDp";

    $result = $conn->conectar()->query($sqlSelect);

    if ($result->num_rows > 0) 
        while($data = mysqli_fetch_assoc($result)){
      
                $nomeC = $data['Nome_C'];
                $nomeP = $data['Nome_P'];
                $descP = $data['Descricao_P'];
                $prUnit = $data['Preco_Unitario_P'];
                $quantidade = $data['Quantidade_Estoque_P'];
        }
  
?>
<!DOCTYPE html>
<html lang="br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Styles/editprod.css">
  <title>Produtos Controle De Estoque</title>
</head>

<body>
  <section class="area-Cadastro">
    <div class="Cadastro">
      <img class="logoimg" src="imagens/caixa.png" alt="">
      <div class="stock">Stock Master</div>
      <div class="Titulo">Edite a tabela produtos</div>
        <form action="attProd.php" method="post">
          <input  type="text" class="form-control" placeholder="Nome do produto" value = "<?php echo $nomeP ?>" name="Nome_P">
          <input  type="text" class="form-control" placeholder="Categoria"value = "<?php echo $nomeC ?>" name="Nome_C">
          <input  type="text" class="form-control" placeholder="Descrição" value = "<?php echo $descP ?>"name="Descricao_P" >
          <input  type="number" class="form-control" placeholder="Preço unitário" value = "<?php echo $prUnit ?>" name="Preco_Unitario_P" >
          <input  type="text" class="form-control" placeholder="Quantidade em estoque" value = "<?php echo $quantidade ?>"name="Quantidade_Estoque_P">
          <input type="hidden" name = "id" value ="<?php echo $IDp?>">
          <div class="inputdiv">  
            <input type="submit" class="BotaoCadastro" value="Salvar">
          </div>
      </form>
    </div>
  </section>
</body>
</html>