<?php

require_once "../conexaoMysql.php";
require_once "../acessoPublico/autenticacao.php";

session_start();
$pdo = mysqlConnect();
exitWhenNotLogged($pdo);

?>

<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Home</title>
    <link rel="icon" href="../images/clinic-medical-solid.svg">

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

        .titulo {
            display: flex;
            justify-content: center;
            text-align: center;
            padding: 20px;     
        }

        .titulo img {
            width: 40px;         
                
        }

        .titulo h1 {
            font-size: 40px;
            margin-left: 8px;     
        }

        main {
            background-color: white;
            padding: 2% 4%;
            border: 0.5px solid gray;
                
            width: 60%;
            margin: 0 auto;
            margin-top: 2%;
        }

        body {
            font-family: "Helvetica Neue", Arial, Helvetica, sans-serif;
            line-height: 1.5rem;
            background-image: url("../images/background.jpg");
            background-size: cover;
            margin: 0;
        }

        footer {
            color: black;
            padding-top: 30px;
            font-size: 13px;
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
                <a class="nav-link active" aria-current="page"href="home.php">Home</a>
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
                <a class="nav-link dropdown-toggle" href="#" role="button"
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
    <main>
        <div class="titulo">
            <img src="../images/logo.png" alt="logo">
            <h1>MultiMed</h1>
        </div>
        <h2>Bem Vindo!</h2>
        <p>Essa é a sua página pessoal da clínica MultiMed, onde você pode realizar cadastros de funcionários, pacientes e conferir os dados cadastrados.</p>
        <hr>
        <a href="../acessoPublico/logout.php">SAIR<a>
    <footer>
        <p>©Copyright 2022. All rights reserved.</p>
    </footer>
    </main>
</body>

</html>
