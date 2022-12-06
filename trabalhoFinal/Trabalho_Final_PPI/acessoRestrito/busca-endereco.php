<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

class Endereco
{
  public $logradouro;
  public $cidade;
  public $estado;

  function __construct($logradouro, $cidade, $estado)
  {
    $this->logradouro = $logradouro;
    $this->cidade = $cidade;
    $this->estado = $estado; 
  }
}

$cep = $_GET['cep'] ?? '';

try{
  $sql = <<<SQL
  SELECT cep, logradouro, cidade, estado
  FROM endereco
  WHERE cep = '$cep'

  SQL;  

  $stmt = $pdo->query($sql);
  $row = $stmt->fetch();

  $endereco = new Endereco($row['logradouro'], $row['cidade'], $row['estado']);
  echo json_encode($endereco);
}
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
