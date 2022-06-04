<?php
$server = "localhost";
$userName = "root";
$password = "";
$dbName = "sistemalogin";
$connect = mysqli_connect($server, $userName, $password, $dbName);

if (mysqli_connect_error()) {
  echo "Conexão falhou! " . mysqli_connect_error();
} else {
  echo "Tudo certo!";
}
