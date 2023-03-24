<?php

require_once("db.php");

$buscar_tarefa = $db->query("SELECT tarefa  FROM tarefas WHERE tarefa ='{$_GET ['tarefa']}'");
//var_dump($buscar_tarefa);
$buscar = null;

    if ($buscar_tarefa && $buscar_tarefa->num_rows > 0) {
        while ($row = $buscar_tarefa->fetch_assoc()) {
            if ($row) {
                $buscar = $row["tarefa"];
            }
        }
    }else if ($db->error) {
        echo json_encode([
            "success"=> false,
            "body" => array(),
            "message" => $db->error,
            "code" => 500
        ]);
        exit;    
    }
    
    echo json_encode([
        "success"=> $buscar ? true : false,
        "body" => $buscar,
        "message" => $buscar ? "Tarefa existente" : "Tem não cadastra",
        "code" => 200
    ]);
    exit;
      
