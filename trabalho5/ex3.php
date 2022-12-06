<?php

function salvaString($string, $arquivo)
{
    $arq = fopen($arquivo, "w");
    fwrite($arq, $string);
    fclose($arq);
}

$email = $senha = "";

if(isset($_POST["email"]))
    $email = trim($_POST["email"]);

if(isset($_POST["senha"]))
    $senha = trim($_POST["senha"]);

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$arquivo = "email.txt";
salvaString($email, $arquivo);
$arquivo = "senha.txt";
salvaString($senhaHash, $arquivo);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 3</title>
</head>
<body>
    <h1>Dados do cadastro salvos com sucesso!</h1> 
</body>
</html>