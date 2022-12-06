<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Exercício 2</title>

    <style>
        .col-sm {
            border: solid 5px gray;
            padding: 15px;
        }

        td, tr {
            text-align: center;
        }
        
    </style>
</head>
<body>
    <?php
    $produtos = ["Lápis", "Caneta", "Dado", "Bola", "Laço",
                "Cola", "Pipa", "Pente", "Chave", "Sabão"];
    $descricao = ["Novo e apontado", "Colorida e nova", "Profissional", "Redonda e macia",
                    "Avermelhado", "Tóxica e potente", "Multicor e frágil", "Resistente",
                    "Enferrujada", "Perfumado e suave"];

    $qde = $_GET["qde"];

    $var1 = rand(0,9);
    $var2 = rand(0,9);
    $var3 = rand(0,9);
    $var4 = rand(0,9);
    $var5 = rand(0,9);
    $var6 = rand(0,9);
    $var7 = rand(0,9);
    $var8 = rand(0,9);
    $var9 = rand(0,9);
    $var10 = rand(0,9);

    if($qde == 10){
        echo <<<HTML
        <table class="table table-striped table-hover">
            <tr>
                <td style="font-weight: bold;">Número</td>
                <td style="font-weight: bold;">Produto</td>
                <td style="font-weight: bold;">Descrição</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Lápis</td>
                <td>$descricao[$var1]</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Caneta</td>
                <td>$descricao[$var2]</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Dado</td>
                <td>$descricao[$var3]</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Bola</td>
                <td>$descricao[$var4]</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Laço</td>
                <td>$descricao[$var5]</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Cola</td>
                <td>$descricao[$var6]</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Pipa</td>
                <td>$descricao[$var7]</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Pente</td>
                <td>$descricao[$var8]</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Chave</td>
                <td>$descricao[$var9]</td>
            </tr>
            <tr>
                <td>10</td>
                <td>Sabão</td>
                <td>$descricao[$var10]</td>
            </tr>
        </table>
        HTML;
    }if($qde == 9){
        echo <<<HTML
        <table class="table table-striped table-hover">
            <tr>
                <td style="font-weight: bold;">Número</td>
                <td style="font-weight: bold;">Produto</td>
                <td style="font-weight: bold;">Descrição</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Lápis</td>
                <td>$descricao[$var1]</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Caneta</td>
                <td>$descricao[$var2]</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Dado</td>
                <td>$descricao[$var3]</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Bola</td>
                <td>$descricao[$var4]</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Laço</td>
                <td>$descricao[$var5]</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Cola</td>
                <td>$descricao[$var6]</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Pipa</td>
                <td>$descricao[$var7]</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Pente</td>
                <td>$descricao[$var8]</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Chave</td>
                <td>$descricao[$var9]</td>
            </tr>
        </table>
        HTML;
    }if($qde == 8){
        echo <<<HTML
        <table class="table table-striped table-hover">
            <tr>
                <td style="font-weight: bold;">Número</td>
                <td style="font-weight: bold;">Produto</td>
                <td style="font-weight: bold;">Descrição</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Lápis</td>
                <td>$descricao[$var1]</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Caneta</td>
                <td>$descricao[$var2]</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Dado</td>
                <td>$descricao[$var3]</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Bola</td>
                <td>$descricao[$var4]</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Laço</td>
                <td>$descricao[$var5]</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Cola</td>
                <td>$descricao[$var6]</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Pipa</td>
                <td>$descricao[$var7]</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Pente</td>
                <td>$descricao[$var8]</td>
            </tr>
        </table>
        HTML;
    }if($qde == 7){
        echo <<<HTML
        <table class="table table-striped table-hover">
            <tr>
                <td style="font-weight: bold;">Número</td>
                <td style="font-weight: bold;">Produto</td>
                <td style="font-weight: bold;">Descrição</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Lápis</td>
                <td>$descricao[$var1]</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Caneta</td>
                <td>$descricao[$var2]</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Dado</td>
                <td>$descricao[$var3]</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Bola</td>
                <td>$descricao[$var4]</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Laço</td>
                <td>$descricao[$var5]</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Cola</td>
                <td>$descricao[$var6]</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Pipa</td>
                <td>$descricao[$var7]</td>
            </tr>
        </table>
        HTML;
    }if($qde == 6){
        echo <<<HTML
        <table class="table table-striped table-hover">
            <tr>
                <td style="font-weight: bold;">Número</td>
                <td style="font-weight: bold;">Produto</td>
                <td style="font-weight: bold;">Descrição</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Lápis</td>
                <td>$descricao[$var1]</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Caneta</td>
                <td>$descricao[$var2]</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Dado</td>
                <td>$descricao[$var3]</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Bola</td>
                <td>$descricao[$var4]</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Laço</td>
                <td>$descricao[$var5]</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Cola</td>
                <td>$descricao[$var6]</td>
            </tr>
        </table>
        HTML;
    }if($qde == 5){
        echo <<<HTML
        <table class="table table-striped table-hover">
            <tr>
                <td style="font-weight: bold;">Número</td>
                <td style="font-weight: bold;">Produto</td>
                <td style="font-weight: bold;">Descrição</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Lápis</td>
                <td>$descricao[$var1]</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Caneta</td>
                <td>$descricao[$var2]</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Dado</td>
                <td>$descricao[$var3]</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Bola</td>
                <td>$descricao[$var4]</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Laço</td>
                <td>$descricao[$var5]</td>
            </tr>
        </table>
        HTML;
    }if($qde == 4){
        echo <<<HTML
        <table class="table table-striped table-hover">
            <tr>
                <td style="font-weight: bold;">Número</td>
                <td style="font-weight: bold;">Produto</td>
                <td style="font-weight: bold;">Descrição</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Lápis</td>
                <td>$descricao[$var1]</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Caneta</td>
                <td>$descricao[$var2]</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Dado</td>
                <td>$descricao[$var3]</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Bola</td>
                <td>$descricao[$var4]</td>
            </tr>
        </table>
        HTML;
    }if($qde == 3){
        echo <<<HTML
        <table class="table table-striped table-hover">
            <tr>
                <td style="font-weight: bold;">Número</td>
                <td style="font-weight: bold;">Produto</td>
                <td style="font-weight: bold;">Descrição</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Lápis</td>
                <td>$descricao[$var1]</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Caneta</td>
                <td>$descricao[$var2]</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Dado</td>
                <td>$descricao[$var3]</td>
            </tr>
        </table>
        HTML;
    }if($qde == 2){
        echo <<<HTML
        <table class="table table-striped table-hover">
            <tr>
                <td style="font-weight: bold;">Número</td>
                <td style="font-weight: bold;">Produto</td>
                <td style="font-weight: bold;">Descrição</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Lápis</td>
                <td>$descricao[$var1]</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Caneta</td>
                <td>$descricao[$var2]</td>
            </tr>
        </table>
        HTML;
    }if($qde == 1){
        echo <<<HTML
        <table class="table table-striped table-hover">
            <tr>
                <td style="font-weight: bold;">Número</td>
                <td style="font-weight: bold;">Produto</td>
                <td style="font-weight: bold;">Descrição</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Lápis</td>
                <td>$descricao[$var1]</td>
            </tr>
        </table>
        HTML;
    }if($qde == 0){
        echo <<<HTML
        <table class="table table-striped table-hover">
            <tr>
                <td style="font-weight: bold;">Número</td>
                <td style="font-weight: bold;">Produto</td>
                <td style="font-weight: bold;">Descrição</td>
            </tr>
        </table>
        HTML;
    }

    ?>
</body>
</html>