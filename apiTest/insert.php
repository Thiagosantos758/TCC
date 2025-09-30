<?php
require 'connect.php';

$nomeEmpresa = $_POST["nomeEmpresa"];
$cnpj = $_POST["cnpj"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$sql = "INSERT INTO users(nome,cnpj,email,senha) VALUES ('$nomeEmpresa', '$cnpj', '$email', '$senha')";
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->query($sql);



?>