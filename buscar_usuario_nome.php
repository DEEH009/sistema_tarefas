<?php

require_once("db.php");

$usuario_buscado = $db->query("SELECT nome FROM users WHERE nome = '{$_GET['nome']}' AND ativo = 1;");

$usuario = null;
if ($usuario_buscado && $usuario_buscado->num_rows > 0) {
    while ($row = $usuario_buscado->fetch_assoc()) {
        if ($row) {
            $usuario = $row["nome"];
        }
    }
} else if ($db->error) {
    echo json_encode([
        "success"=> false,
        "body" => array(),
        "message" => $db->error,
        "code" => 500
    ]);
    exit;    
}

echo json_encode([
    "success"=> $usuario ? true : false,
    "body" => $usuario,
    "message" => $usuario ? "Usuario encontrado" : "Usuario não encontrado",
    "code" => 200
]);
exit;