<?php
include_once 'conexao.php';
include_once 'usuario.php';

    $usuario = new usuario();
    $conn = new conexaoBanco();

    $IDu = $_GET['id'];

    $sqlSelect = "SELECT * FROM usuarios WHERE IDu = $IDu";

    $result = $conn->conectar()->query($sqlSelect);

    if ($result->num_rows > 0) 
        while($data = mysqli_fetch_assoc($result)){

          $nome = $data['Nome_U'];
          $email = $data['Email_U'];
          $telefone = $data['Telefone_U'];
          $cnpj = $data['CPF_CNPJ_U'];
          $senha = $data['Senha_U'];
          $nacio = $data['Nacionalidade'];
        }
  
?>
<!DOCTYPE html>
<html lang="br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Styles/Cadastro.css">
  <script src="validate.js" defer></script>
  <title>Editar Usuário</title>
</head>

<body>
  <section class="area-Cadastro">
    <div class="Cadastro">
      <img class="logoimg" src="imagens/caixa.png" alt="">
      <div class="stock">Stock Master</div>
      <div class="Titulo">Editar Usuário</div>
        <form action="attUsu.php" method="post" id="formcad">
          <input id="nome" type="text" class="form-control" placeholder="Nome Completo" value= "<?php echo $nome ?>" name="Nome_U"  required autofocus autocomplete="off">
          <input id="email" type="email" class="form-control" placeholder="E-mail" name="Email_U" value= "<?php echo $email ?>" required autocomplete="off">
          <input id="telefone" type="text" class="form-control" placeholder="Telefone" name="Telefone_U"value= "<?php echo $telefone?>" required autocomplete="off">
          <input id="cnpj" type="text" class="form-control" placeholder="CNPJ" name="CPF_CNPJ_U" value= "<?php echo $cnpj ?>" required autocomplete="off">
          <input id="Senha_U" type="text" class="form-control" placeholder="Senha" name="Senha_U" value= "<?php echo $senha ?>" patern="(?=(.*[0-9]))((?=.*[A-Za z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$" required autocomplete="off">
          <input id="nacionalidade" type="text" class="form-control" placeholder="Nacionalidade" value= "<?php echo $nacio ?>" name="Nacionalidade" required autocomplete="off">
          <input type="hidden" name = "id" value ="<?php echo $IDu?>">
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