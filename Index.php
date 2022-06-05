<?php
// conexão
require_once 'dbConnection.php';

// sessão
session_start();

if (isset($_POST['entrar'])) {
  $erros = array();
  $login = mysqli_escape_string($connect, $_POST['login']);
  $senha = mysqli_escape_string($connect, $_POST['senha']);

  if (empty($login) or empty($senha)) {
    $erros[] = "<li> Login e Senha devem ser preenchidos! </li><br>";
  } else {
    $sql = "SELECT login FROM usuarios WHERE login = '$login'";
    $resultado = mysqli_query($connect, $sql);

    if (mysqli_num_rows($resultado) > 0) {
      $senha = md5($senha);
      $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
      $resultado = mysqli_query($connect, $sql);

      if (mysqli_num_rows($resultado) == 1) {
        $dados = mysqli_fetch_array($resultado);
        mysqli_close($connect);
        $_SESSION['logado'] = true;
        $_SESSION['idUsuario'] = $dados['id'];
        $_SESSION['nome'] = $dados['nome'];
        header('Location: Home.php');
      } else {
        $erros[] = "<li> Usuário e Senha não conferem! </li> <br>";
      }
    } else {
      $erros[] = "<li> Usuário não encontrado! </li> <br>";
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
  <title>Login</title>
</head>

<body>
  <h1>Login</h1>
  <?php
  if (!empty($erros)) {
    foreach ($erros as  $erro) {
      echo $erro;
    }
    echo "<hr>";
  }

  ?>
  <form action="" method="POST">
    Login: <input type="text" name="login"><br>
    Senha: <input type="password" name="senha"><br>
    <button type="submit" name="entrar">Entrar</button>

  </form>
  <br>
  <p>Não possui uma conta? <a href="CreateAccount.php">Criar conta</a></p>
</body>

</html>