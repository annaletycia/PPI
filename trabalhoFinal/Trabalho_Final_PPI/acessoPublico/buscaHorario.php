<?php
    require "../conexaoMysql.php";
    $pdo = mysqlConnect();

    try {
        $data = $_GET['data'] ?? '';
        $id_medico = (int) $_GET['medico'] ?? '';
        

        $sql = <<<SQL
            SELECT horario
            FROM agenda
            WHERE data_consulta = "$data"
            AND id_medico = $id_medico
        SQL;

        $stmt = $pdo->query($sql);

        $horarios = [];

        while($row = $stmt->fetch()) {
            $horario = $row['horario'];
            array_push($horarios, $horario);
        }

        echo json_encode($horarios);
    }
    catch(Exception $e) {
        exit('Falha ao consultar os dados: ' . $e->getMessage());
    }
?>