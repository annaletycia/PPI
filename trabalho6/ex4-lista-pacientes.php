<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
  SELECT nome, sexo, email, telefone, 
        cep, logradouro, cidade, estado, peso, altura, tiposanguineo
  FROM paciente INNER JOIN pessoa ON paciente.id = id_pessoa
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
  <title>Exercício 4</title>

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
    <h3>Pacientes Cadastrados</h3>
    <table class="table table-striped table-hover">
      <tr>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>CEP</th>
        <th>Logradouro</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Peso</th>
        <th>Altura</th>
        <th>Tipo Sanguíneo</th>
      </tr>

      <?php
      while ($row = $stmt->fetch()) {

        $nome = htmlspecialchars($row['nome']);
        $sexo = htmlspecialchars($row['sexo']);
        $email = htmlspecialchars($row['email']);
        $telefone = htmlspecialchars($row['telefone']);
        $cep = htmlspecialchars($row['cep']);
        $logradouro = htmlspecialchars($row['logradouro']);
        $cidade = htmlspecialchars($row['cidade']);
        $estado = htmlspecialchars($row['estado']);
        $peso = htmlspecialchars($row['peso']);
        $tiposanguineo = htmlspecialchars($row['tiposanguineo']);


        echo <<<HTML
          <tr>
            <td>$nome</td> 
            <td>$sexo</td>
            <td>$email</td>
            <td>$telefone</td>
            <td>$cep</td>
            <td>$logradouro</td>
            <td>$cidade</td>
            <td>$estado</td>
            <td>$peso</td> 
            <td>{$row['altura']}</td>
            <td>$tiposanguineo</td>
          </tr>      
        HTML;
      }
      ?>
    </table>
  </div>

</body>

</html>