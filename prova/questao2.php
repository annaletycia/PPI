<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
  SELECT nome_dep, relacao, data_nascimento, nome_seg, cpf, email, premio
    FROM dependente, segurado
    WHERE segurado.id = dependente.id_segurado
  SQL;

  $stmt = $pdo->query($sql);

} 
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Questão 2</title>

    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

  <style>
    body {
      padding-top: 2rem;
    }

    img {
      width: 15px;
      height: 15px;
    }

  </style>
</head>

<body>

<div class="container">
    <h3>Dados Cadastrados</h3>
    <table class="table table-striped table-hover">
      <tr>
        <th>Nome Dependente</th>
        <th>Relação</th>
        <th>Data Nascimento</th>
        <th>Nome Segurado</th>
        <th>CPF</th>
        <th>Email</th>
        <th>Premio</th>
      </tr>

      <?php
      while ($row = $stmt->fetch()) {

        $nome_dep = htmlspecialchars($row['nome_dep']);
        $relacao = htmlspecialchars($row['relacao']);
        $nome_seg = htmlspecialchars($row['nome_seg']);
        $cpf = htmlspecialchars($row['cpf']);
        $email = htmlspecialchars($row['email']);
        $premio = htmlspecialchars($row['premio']);

        echo <<<HTML
          <tr>
            <td>$nome_dep</td> 
            <td>$relacao</td>
            <td>{$row['data_nascimento']}</td>
            <td>$nome_seg</td>
            <td>$cpf</td>
            <td>$email</td>
            <td>$premio</td>
          </tr>      
        HTML;
      }
      ?>
    </table>
  </div>

</body>

</html>