<?php
include("db.php");
// var_dump($_POST);

$nome = $_POST["nome"];
$email =$_POST["email"];
$senha =$_POST["senha"];


$buscarusario =$db->query("SELECT * FROM users WHERE nome='{$nome}' AND email='{$email}'" );
if ($buscarusario) { 
    if ($buscarusario->num_rows === 0) {
        
        $create = $db->query("INSERT INTO users (nome,email,senha) VALUES ('{$nome}','{$email}','{$senha}' )");
        if ($create) {
            echo "criado";
            
        }else {
            echo $db->error;
        } 
    }else {
        header("location: login.html");
        exit;
    }
    //var_dump($buscarusario);
    echo "existe";
}else {
    echo $db->error;
}

header("location: login.html");
exit;