<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

class Endereco
{
  public $rua;
  public $bairro;
  public $cidade;

  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
  }
}

$cep = htmlspecialchars($_GET['cep'] ?? ''); 

  $sql = "SELECT * FROM tabela_endereco WHERE cep = '$cep'";
  //Prepared statements para prevenir ataques do tipo SQL Injection
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$cep]);

  try {

    $result = $pdo->query($sql);

    $row = $result->fetch();

    $endereco = new Endereco($row['rua'], $row['bairro'], $row['cidade']);

    echo json_encode($endereco);

  } 
  catch (Exception $e) {
    exit('Ocorreu uma falha: ' . $e->getMessage());
  }