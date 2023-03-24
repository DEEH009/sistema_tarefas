<?php 

require_once("db.php");

$buscar_senha = $db->query("SELECT nome FROM users WHERE nome = '{$_GET['nome']}' AND senha = '{$_GET['senha']}'");

$buscar = null;

if ($buscar_senha && $buscar_senha->num_rows > 0) {
    while ($row = $buscar_senha->fetch_assoc()) {
        if ($row) {
            $buscar = $row["nome"];
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
    "message" => $buscar ? "Usuario encontrado" : "Senha não confere",
    "code" => 200
]);
exit;


