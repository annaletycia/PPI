<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

// Resgata os dados do paciente
$nome = $_POST["nome"] ?? "";
$sexo  = $_POST["sexo"] ?? "";
$email = $_POST["email"] ?? "";
$telefone = $_POST["telefone"] ?? "";
$cep = $_POST["cep"] ?? "";
$logradouro = $_POST["logradouro"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estado"] ?? "";

// Resgata os dados específicos do paciente
$peso = $_POST["peso"] ?? "";
$altura = $_POST["altura"] ?? "";
$tiposanguineo = $_POST["tiposanguineo"] ?? "";

$sql1 = <<<SQL
  INSERT INTO pessoa (nome, sexo, email, telefone, 
                       cep, logradouro, cidade, estado)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?)
  SQL;

$sql2 = <<<SQL
  INSERT INTO paciente 
    (peso, altura, tiposanguineo, id_pessoa)
  VALUES (?, ?, ?, ?)
  SQL;

try {
  $pdo->beginTransaction();

  // Inserção na tabela pessoa com uso de prepared statements por segurança
  $stmt1 = $pdo->prepare($sql1);
  if (!$stmt1->execute([
    $nome, $sexo, $email, $telefone, 
    $cep, $logradouro, $cidade, $estado
  ])) throw new Exception('Falha na primeira inserção');

  // Inserção na tabela paciente
  // Precisamos do id da pessoa cadastrada, que
  // foi gerado automaticamente pelo MySQL
  // na operação acima (campo auto_increment), para
  // prover valor para o campo do tipo chave estrangeira
  $idNovoPaciente = $pdo->lastInsertId();
  $stmt2 = $pdo->prepare($sql2);
  if (!$stmt2->execute([
    $peso, $altura, $tiposanguineo, $idNovoPaciente
  ])) throw new Exception('Falha na segunda inserção');

  // Efetiva as operações
  $pdo->commit();

  header("location: ex4.html");
  exit();
} 
catch (Exception $e) {
  $pdo->rollBack();
  if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
  else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
