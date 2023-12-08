<?php
include_once 'conexao.php';
include_once 'produtos.php';

    $produtos = new produtos();
    $conn = new conexaoBanco();

    $IDc = $_GET['id'];

    $sqlSelect = "SELECT * FROM categorias WHERE IDc = $IDc";

    $result = $conn->conectar()->query($sqlSelect);

    if ($result->num_rows > 0) 
        while($data = mysqli_fetch_assoc($result)){
      
                $nomeC = $data['Nome_C'];
        }
?>

<!DOCTYPE html>
<html lang="br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Styles/editcat.css">
  <title>Produtos Controle De Estoque</title>
</head>

<body>
  <section class="area-Cadastro">
    <div class="Cadastro">
      <img class="logoimg" src="imagens/caixa.png" alt="">
      <div class="stock">Stock Master</div>
      <div class="Titulo">Edite a tabela categorias</div>
        <form action="attCat.php" method="post" id="formcad">
          <input  type="text" class="form-control" placeholder="Nome categoria" value = "<?php echo $nomeC ?>"name="Nome_C">
          <input type="hidden" name = "id" value ="<?php echo $IDc?>">
          <div class="inputdiv">  
            <input type="submit" class="BotaoCadastro" value="Salvar">
          </div>
      </form>
    </div>
  </section>
</body>
</html>