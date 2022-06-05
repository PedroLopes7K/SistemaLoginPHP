<?php
// conexão
require_once 'dbConnection.php';

// sessão
session_start();

// verificação

if (!isset($_SESSION['logado'])) {
  header('Location: Index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página restrita</title>
</head>

<body>
  <h1>Olá <?php echo $_SESSION['nome']; ?></h1>

  <a href="Logout.php">SAIR</a>
</body>

</html>