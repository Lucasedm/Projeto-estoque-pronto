<?php
include_once 'conexao.php';
include_once 'fornecedores.php';

    $produtos = new fornecedores();
    $conn = new conexaoBanco();

    $IDf = $_GET['id'];

    $sqlSelect = "SELECT * FROM fornecedores WHERE IDf = $IDf";

    $result = $conn->conectar()->query($sqlSelect);

    if ($result->num_rows > 0) 
        while($data = mysqli_fetch_assoc($result)){
      
            $nomeFor = $data['Nome_F'];
            $contFor = $data['Contato_F'];
            $cnpj = $data['CNPJ_F'];
            $endereco = $data['Endereco'];
            $numero = $data['Numero'];
            $cep = $data['CEP'];
        }
  
?>

<!DOCTYPE html>
<html lang="br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Styles/editforn.css">
  <script src="validate.js" defer></script>
  <title>Produtos Controle De Estoque</title>
</head>

<body>
  <section class="area-Cadastro">
    <div class="Cadastro">
      <img class="logoimg" src="imagens/caixa.png" alt="">
      <div class="stock">Stock Master</div>
      <div class="Titulo">editar fornecedores</div>
        <form action="attfornadm.php" method="post" id="formcad">
          <input  type="text" class="form-control" placeholder="Nome fornecedores"  value = "<?php echo $nomeFor ?>" name="Nome_F" >
          <input id = "telefone" type="text" class="form-control" placeholder="Contato fornecedores" value = "<?php echo $contFor ?>" name="Contato_F" >
          <input id = "cnpj" type="text" class="form-control" placeholder="CNPJ fornecedores" value = "<?php echo $cnpj ?>" name="CNPJ_F">
          <input  type="text" class="form-control" placeholder="Endereço fornecedores"  value = "<?php echo $endereco ?>" name="Endereco" >
          <input  type="text" class="form-control" placeholder="Número fornecedores"  value = "<?php echo $numero ?>" name="Numero">
          <input  type="text" class="form-control" placeholder="CEP fornecedores" value = "<?php echo $cep  ?>" name="CEP">
          <input type="hidden" name = "id" value ="<?php echo $IDf?>">
          <div class="inputdiv">  
            <input type="submit" class="BotaoCadastro" value="Salvar">
          </div>
      </form>
    </div>
  </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

<script>
  $('#telefone').mask('(00) 0 0000-0000');
  $('#cnpj').mask('00.000.000/0000-00', { reverse: true });
</script>
</body>
</html>