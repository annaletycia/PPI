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

    //Dados referente à tabela funcionario
    $dataInicioTrabalho = $_POST["dataInicioTrabalho"] ?? "";
    $salario = $_POST["salario"] ?? "";
    $senha = $_POST["senha"] ?? "";

    //calculando o hash para guardar no BD
    $hashSenha = password_hash($senha, PASSWORD_DEFAULT);

    $sqlPessoa = <<<SQL
    INSERT INTO pessoa(nome, sexo, email, telefone, cep, logradouro, cidade, estado)
    VALUES (? , ? , ? , ? , ? , ? , ? , ?)
    SQL;

    $sqlFuncionario = <<<SQL
    INSERT INTO funcionario (data_contrato, salario, hash_senha, id_pessoa)
    VALUES (?, ?,  ?, ?)
    SQL;

    //primeiro: conferimos qual o tipo de funcionário que será inserido
    $tipoFuncionario = $_POST["tipoFuncionario"] ?? "";

    
        //começando transação:
        try {
            $pdo->beginTransaction();

            $stmtPessoa = $pdo->prepare($sqlPessoa);
            if(!$stmtPessoa->execute([$nome, $sexo, $email, $telefone, $cep,
                $logradouro, $cidade, $estado]))
                    throw new Exception('Falha na primeira Inserção');
        
            //pegando o id da pessoa que acabou de ser inserido no banco
            $codigoNovoFuncionario = $pdo->lastInsertId();

            $stmtFuncionario = $pdo->prepare($sqlFuncionario);
            if(!$stmtFuncionario->execute([$dataInicioTrabalho, $salario, $hashSenha,
                $codigoNovoFuncionario]))
                    throw new Exception('Falha na segunda inserção');

            //conferindo o tipo de funcionario:
            if($tipoFuncionario == "medico"){
                
                $especialidade = $_POST["especialidade"] ?? "";
                $crm = $_POST["crm"] ?? "";
        
                $sqlMedico = <<< SQL
                    INSERT INTO medico(especialidade, CRM, id_funcionario)
                    VALUES(? , ?, ?)
                SQL;

                $codigoNovoMedico = $pdo->lastInsertId();

                $stmtMedico = $pdo->prepare($sqlMedico);
                if(!$stmtMedico->execute([$especialidade, $crm, $codigoNovoMedico,]))
                    throw new Exception('Falha na terceira inserção');
            }

            $pdo->commit();

            header("location: lista_funcionarios.php");
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