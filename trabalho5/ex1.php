<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Exercício 1</title>

    <style>
        .col-sm {
            border: solid 5px purple;
            padding: 15px;
        }
        
    </style>
</head>
<body>
    <?php
    if(isset($_POST["CEP"]))
        $cep = $_POST["CEP"];
    if(isset($_POST["logradouro"]))
        $logradouro = $_POST["logradouro"];
    if(isset($_POST["bairro"]))
        $bairro = $_POST["bairro"];
    if(isset($_POST["cidade"]))
        $cidade = $_POST["cidade"];
    if(isset($_POST["estado"]))
        $estado = $_POST["estado"];
    
    $cep = htmlspecialchars($cep);
    $logradouro = htmlspecialchars($logradouro);
    $bairro = htmlspecialchars($bairro);
    $cidade = htmlspecialchars($cidade);
    $estado = htmlspecialchars($estado);

    echo <<<HTML
    <div class="container">
        <div class="row">
            <td><div class="col-sm">$cep</div>
            <td><div class="col-sm">$logradouro</div>
            <td><div class="col-sm">$bairro</div>
            <td><div class="col-sm">$cidade</div>
            <td><div class="col-sm">$estado</div>
        </div>
    </div>
HTML;
    ?>
</body>
</html>