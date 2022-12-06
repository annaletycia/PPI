<?php

  require "../conexaoMysql.php";
  $pdo = mysqlConnect();

  $data_consulta = $_POST["data"] ?? "";
  $horario = $_POST["horario"] ?? "";
  $nome = $_POST["nome"] ?? "";
  $sexo = $_POST["sexo"] ?? "";
  $email = $_POST["email"] ?? "";
  $id_medico = (int) $_POST["medico"] ?? "";
  

  try{

    $sql = <<<SQL
      INSERT INTO agenda(data_consulta, horario, nome_paciente, sexo_paciente,
        email_paciente, id_medico)
      VALUES (? , ? , ? , ? , ? , ?)
    SQL;
        
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$data_consulta, $horario, $nome, $sexo, $email, $id_medico]);

    header("location: agendamento.html");
    exit();
  } 
  catch (Exception $e) {  
    if ($e->errorInfo[1] === 1062)
      exit('Dados duplicados: ' . $e->getMessage());
    else
      exit('Falha ao cadastrar os dados: ' . $e->getMessage());
  }
?>
