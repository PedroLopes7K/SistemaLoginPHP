<?php
require_once 'dbConnection.php';
session_start();

// verificaçã se nãp estiver logado
if (!isset($_SESSION['logado'])) {
  header('Location: Index.php');
}
if (isset($_POST['delete'])) {
  // echo "<h1>ENVIOU </h1>";
  $id = $_SESSION['idUsuario'];
  $query = "DELETE FROM usuarios WHERE id = '$id'";

  if (mysqli_query($connect, $query)) {
    // echo "<h1> Conta deletada!</h1>";
    header('Location: Logout.php');
  }

  // sleep(10);

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deletar conta</title>
</head>

<body>
  <h2>Quer mesmo deletar sua conta?</h2>
  <form action="deleteAccount.php" method="POST">
    <input type="hidden" name="delete" value="delete">
    <button type="submit">Deletar</button>
  </form>
  <a href="Home.php"> Voltar para Home.</a>
</body>

</html>