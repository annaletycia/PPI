<?php

function carregaString($arquivo)
{
    $arq = fopen($arquivo, "r");
    $string = fgets($arq);
    fclose($arq);
        return $string;
}

$email = $senha = "";

$email = carregaString("email.txt");
$senha = carregaString("senha.txt");

$email = htmlspecialchars($email);
$senha = htmlspecialchars($senha);

echo <<<HTML
<p>Email cadastrado: $email</p>
<p>Senha cadastrada: $senha</p>
HTML;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 4</title>
</head>
<body>
    
</body>
</html>