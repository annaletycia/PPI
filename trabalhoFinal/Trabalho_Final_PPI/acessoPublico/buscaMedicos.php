<?php
require "../conexaoMysql.php";
$pdo = mysqlConnect();

class Medico {
    public $id_medico;
    public $nome_medico;
  

    function __construct($id_medico, $nome_medico) {
        $this->id_medico = $id_medico;
        $this->nome_medico = $nome_medico;
    }
}

try {
  $especialidade = $_GET['especialidade'] ?? '';

    $sql = <<< SQL
        SELECT pessoa.nome, medico.id
        FROM medico
        INNER JOIN funcionario
        ON medico.id_funcionario = funcionario.id
        INNER JOIN pessoa
        ON funcionario.id_pessoa = pessoa.id
        WHERE medico.especialidade = ?
    SQL;

  $stmt = $pdo->prepare($sql);
  $stmt->execute([$especialidade]);

  $medicos = [];
  
  while($row = $stmt->fetch()) {
    $medico = new Medico($row['id'], $row['nome']);
    array_push($medicos, $medico);
  }
  
  echo json_encode($medicos);
}
catch(Exception $e) {
  exit('Falha ao consultar os dados: ' . $e->getMessage());
}

?>