<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
  SELECT cep, logradouro, cidade, estado
  FROM endereco
  SQL;

  // Neste exemplo não é necessário utilizar prepared statements
  // porque não há possibilidade de injeção de SQL, 
  // pois nenhum parâmetro é utilizado na query SQL
  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  //error_log($e->getMessage(), 3, 'log.php');
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Endereços</title>
  <link rel="icon" href="../images/clinic-medical-solid.svg">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
  <style>
      #headerContent {
            display: flex;
            justify-content: center;
            text-align: center;
            color: rgb(52, 89, 124);
            background-color: whitesmoke;
            padding: 6px;
            padding-top: 10px;
            border: 10em black;
        }

        #headerContent h3 {
            margin-left: 6px;
            padding-top: 4px;
        }

        #headerContent img {
            width: 40px;
            height: 40px;
        }

        nav {
            background-color: whitesmoke;
            border-bottom-right-radius: 8px;
            border-bottom-left-radius: 8px;
            padding: 2px;
            box-shadow: 5px 5px 15px 5px #858585;
        }

      h3 {
        text-align: center;
      }
  </style>
</head>

<body>
  <header>
        <div class="container" id="headerContent">
    
          <img src="../images/logo.png" alt="logo">
          <h3>MultiMed</h3>
    
        </div>
  </header>
  <nav class="container">
    <ul class="nav nav-pills nav-fill justify-content-center p-1">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" 
            id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">Cadastrar</a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
          <li><a class="nav-item dropdown-item" href="cadastroFuncionario.html">Novo Funcionário</a></li>
          <li><a class="nav-item dropdown-item" href="cadastroPaciente.html">Novo Paciente</a></li>
        </ul>
      </li>           
      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" aria-current="page" href="#" role="button"
          id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">Listar</a>              
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
          <li><a class="dropdown-item" href="lista_funcionarios.php">Funcionários</a></li>
          <li><a class="dropdown-item" href="lista_pacientes.php">Pacientes</a></li>
          <li><a class="dropdown-item" href="lista_enderecos.php">Endereços</a></li>
          <li><a class="dropdown-item" href="lista_agendamentos.php">Agendamentos</a></li>
        </ul>
      </li>
    </ul>  
  </nav>

  <div class="container">
    <h3>Endereços Cadastrados</h3>
    <table class="table table-striped table-hover">
      <tr>
        <th>CEP</th>
        <th>Logradouro</th>
        <th>Cidade</th>
        <th>Estado</th>
      </tr>

<?php
  while ($row = $stmt->fetch()) {

    // Limpa os dados produzidos pelo usuário
    // com possibilidade de ataque XSS
    $cep = htmlspecialchars($row['cep']);
    $logradouro = htmlspecialchars($row['logradouro']);
    $cidade = htmlspecialchars($row['cidade']);
    $estado = htmlspecialchars($row['estado']);

    echo <<<HTML
      <tr>
        <td>$cep</td>
        <td>$logradouro</td>
        <td>$cidade</td>
        <td>$estado</td>
      </tr>      
    HTML;
  }
?>

    </table>
  </div>

</body>

</html>