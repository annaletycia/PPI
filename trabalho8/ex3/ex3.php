<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

class Medico 
{
  public $nome;
  public $telefone; 

  function __construct($nome, $telefone)
  {
    $this->nome = $nome;
    $this->telefone = $telefone;
  }
}

try {

    $especialidade = $_GET["especialidade"] ?? "";

    $sql = <<<SQL
        SELECT nome, telefone
        FROM medico
        WHERE especialidade = ?
        SQL;

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$especialidade]);

    $medicos = [];
    while ($row = $stmt->fetch()) {
        $medico = new Medico(htmlspecialchars($row['nome']), htmlspecialchars($row['telefone']));
        array_push($medicos, $medico);
    }
    
    echo json_encode($medicos);
}
catch (Exception $e) {
  exit('Falha inesperada: ' . $e->getMessage());
}

?>