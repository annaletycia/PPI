<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

// dados do segurado
$segurado_nome = $_GET["segurado_nome"] ?? "";
$segurado_cpf  = $_GET["segurado_cpf"] ?? "";
$segurado_email = $_GET["segurado_email"] ?? "";
$segurado_premio = $_GET["segurado_premio"] ?? "";

// dados do dependente
$dependente_nome = $_GET["dependente_nome"] ?? "";
$dependente_relacao = $_GET["dependente_relacao"] ?? "";
$dependente_nascimento = $_GET["dependente_nascimento"] ?? "";

$sql1 = <<<SQL
  INSERT INTO segurado (nome_seg, cpf, email, premio)
  VALUES (?, ?, ?, ?)
  SQL;

$sql2 = <<<SQL
  INSERT INTO dependente 
    (nome_dep, relacao, data_nascimento, id_segurado)
  VALUES (?, ?, ?, ?)
  SQL;

try {
  $pdo->beginTransaction();

  // Inserção na tabela segurado com prepared statements
  $stmt1 = $pdo->prepare($sql1);
  if (!$stmt1->execute([
    $segurado_nome, $segurado_cpf, $segurado_email, $segurado_premio,
  ])) throw new Exception('Falha na primeira inserção');

  // Inserção na tabela dependente com prepared statements
  $idSegurado = $pdo->lastInsertId();
  $stmt2 = $pdo->prepare($sql2);
  if (!$stmt2->execute([
    $dependente_nome, $dependente_relacao, $dependente_nascimento, $idSegurado
  ])) throw new Exception('Falha na segunda inserção');

  // Efetiva as operações
  $pdo->commit();

  header("location: questao1.html");
  exit();
} 
catch (Exception $e) {
  $pdo->rollBack();
  if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
  else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}