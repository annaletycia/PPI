<?php
require "conexaoMysql.php";
$pdo = mysqlConnect();

class RequestResponse
{
  public $success;
  public $destination;
  function __construct($success, $destination)
  {
    $this->success = $success;
    $this->destination = $destination;
  }
}

  try {

    $sql = <<<SQL
      SELECT hash_senha
      FROM login_usuario
      WHERE email = ?
      SQL;

    $email = $_POST["email"] ?? "";
    $senha = $_POST["senha"] ?? "";

    // Neste caso utilize prepared statements para prevenir
    // ataques do tipo SQL Injection, pois precisamos
    // inserir dados fornecidos pelo usuário na 
    // consulta SQL (o email do usuário)
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $row = $stmt->fetch();
    if (!$row) $success=false; // nenhum resultado (email não encontrado)
    
    $success=password_verify($senha, $row['hash_senha']);

    $response = new RequestResponse($success, "home.html");
    echo json_encode($response);
  } 
  catch (Exception $e) {
    //error_log($e->getMessage(), 3, 'log.php');
    exit('Falha inesperada: ' . $e->getMessage());
  }

?>