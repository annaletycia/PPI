<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$cep = $_POST["cep"] ?? "";
$logradouro = $_POST["logradouro"] ?? "";
$bairro = $_POST["bairro"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estado"] ?? "";

try {

  $sql = <<<SQL
  INSERT INTO endereco (cep, logradouro, bairro, cidade, estado)
  VALUES (?, ?, ?, ?, ?)
  SQL;

  //Prepared statements para prevenir ataques do tipo SQL Injection
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$cep, $logradouro, $bairro, $cidade, $estado]);

  header("location: ex2-mostra-enderecos.php");
  exit();
} 
catch (Exception $e) {  
  //error_log($e->getMessage(), 3, 'log.php');
  if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
  else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
