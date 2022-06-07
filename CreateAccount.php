<?php
require_once 'dbConnection.php';
$errs = array();
if (isset($_POST['cadastrar'])) {
  if (empty($_POST['log']) or empty($_POST['password'])) {
    $errs[] =  "<li> Login e Senha devem ser preenchidos! </li><br>";
  } else {
    $nome = $_POST['nome'];
    $log = $_POST['log'];
    $password = md5($_POST['password']);
    $query = "SELECT login FROM usuarios WHERE login = '$log'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) == 1) {
      $errs[] =  "<li> Login já cadastrado no sistema! </li><br>";
    } else {
      $qry = "INSERT INTO usuarios (nome, login, senha) VALUES ('$nome', '$log', '$password')";
      mysqli_query($connect, $qry);
      echo "<h1>Conta criada com sucesso!</h1>";
      // header('Location: Index.php');
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar conta</title>
</head>

<body>
  <h1>Criar conta</h1>

  <?php
  if (!empty($errs)) {
    foreach ($errs as  $err) {
      echo $err;
    }
    echo "<hr>";
  }

  ?>
  <form action="CreateAccount.php" method="POST">
    Nome: <input type="text" name="nome"><br>
    Login: <input type="text" name="log"><br>
    Senha: <input type="password" name="password"><br>
    <button type="submit" name="cadastrar">Cadastrar</button>

  </form>
  <br>
  <a href="Index.php">Voltar para login</a>
</body>

</html>