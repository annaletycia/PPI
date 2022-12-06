<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
  SELECT email, hash_senha
  FROM login_usuario
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercício 3</title>

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
    <h3>Usuários Cadastrados</h3>
    <table class="table table-striped table-hover">
      <tr>
        <th>Email</th>
        <th>SenhaHash</th>
      </tr>

      <?php
      while ($row = $stmt->fetch()) {

        $email = htmlspecialchars($row['email']);

        echo <<<HTML
          <tr>
            <td>$email</td>
            <td>{$row['hash_senha']}</td>
          </tr>      
        HTML;

      }
      ?>

    </table>
  </div>

</body>

</html>