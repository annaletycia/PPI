<?php
    require "../conexaoMysql.php";
    $pdo = mysqlConnect();

    try {
        $sql = <<<SQL
            SELECT especialidade
            FROM medico    
        SQL;

        $stmt = $pdo->query($sql);

        $especialidades = [];

        while($row = $stmt->fetch()) {
            $especialidade = $row['especialidade'];
            array_push($especialidades, $especialidade);
        }

        echo json_encode($especialidades);
    }
    catch(Exception $e) {
        exit('Falha ao consultar os dados: ' . $e->getMessage());
    }
?>