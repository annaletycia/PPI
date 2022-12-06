<?php
    require "../conexaoMysql.php";
    $pdo = mysqlConnect();

    //Dados referente à tabela pessoa:
    $nome = $_POST["nome"] ?? "";
    $sexo = $_POST["sexo"] ?? "";
    $email = $_POST["email"] ?? "";
    $telefone = $_POST["telefone"] ?? "";
    $cep = $_POST["cep"] ?? "";
    $logradouro = $_POST["logradouro"] ?? "";
    $cidade = $_POST["cidade"] ?? "";
    $estado = $_POST["estado"] ?? "";

    //Dados referente à tabela paciente
    $peso = $_POST["peso"] ?? "";
    $altura = $_POST["altura"] ?? "";
    $tipoSanguineo = $_POST["tipoSanguineo"];

    $sqlPessoa = <<<SQL
    INSERT INTO pessoa(nome, sexo, email, telefone, cep, logradouro, cidade, estado)
    VALUES (? , ? , ? , ? , ? , ? , ? , ?)
    SQL;

    $sqlPaciente = <<<SQL
    INSERT INTO paciente (peso, altura, tipo_sanguineo, id_pessoa)
    VALUES (?, ?,  ?, ?)
    SQL;

        //começando transação:
        try {
            $pdo->beginTransaction();

            $stmtPessoa = $pdo->prepare($sqlPessoa);
            if(!$stmtPessoa->execute([$nome, $sexo, $email, $telefone, $cep,
                $logradouro, $cidade, $estado]))
                    throw new Exception('Falha na primeira Inserção');
        
            //pegando o id da pessoa que acabou de ser inserido no banco
            $codigoNovoPaciente = $pdo->lastInsertId();

            $stmtPaciente = $pdo->prepare($sqlPaciente);
            if(!$stmtPaciente->execute([$peso, $altura, $tipoSanguineo,
                $codigoNovoPaciente]))
                    throw new Exception('Falha na segunda inserção');

            $pdo->commit();

            header("location: lista_pacientes.php");
            exit();
        }

        catch(Exception $e) {
            $pdo->rollBack();
            if($e->errorInfo[1] === 1062)
                exit('Dados duplicado: ' . $e->getMessage());
            else
                exit('Falha ao cadastrar os dados: ' . $e->getMessage());
        }
    

    
        

        
        
    
?>