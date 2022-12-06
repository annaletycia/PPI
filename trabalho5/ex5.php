<?php

function carregaString($arquivo)
{
    $arq = fopen($arquivo, "r");
    $string = fgets($arq);
    fclose($arq);
        return $string;
}
    $email = $senha = "";

    if(isset($_POST["email"]))
        $email = trim($_POST["email"]);
    
    if(isset($_POST["senha"]))
        $senha = trim($_POST["senha"]);

    $emailSalvo = carregaString("email.txt");
    $senhaSalva = carregaString("senha.txt");

    //validação de login:
    if(password_verify($senha, $senhaSalva) && $email == $emailSalvo){
            header("Location: sucesso.html");
            exit();
    }else{
        header("Location: ex5.html");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 5</title>
</head>
<body>

</body>
</html>