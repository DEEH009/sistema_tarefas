<?php 
    include("db.php");

    if (!isset($_SESSION["usuario_logado"]) || $_SESSION["usuario_logado"] === false) {
        header("location: login.html");
    }
 ?>   

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Serviços</title>
</head>
<body>
    <h1> Você está logado </h1>
    <?php
        echo "bem vindo {$_SESSION['usuario']['nome']}\n";
    ?>

    <h2>Serviços</h2>
    <br>
    <button><a href="buscarcep.html">Buscador CEP</a></button> 
    <br>
    <button><a href="index.php">Lista de tarefas</a></button> 
 

  
    <?php
    $a = [[["nome" => "guilherme"]]];
    $b = ["andre", "mateus"];

    $c = [["nome" => "gui"], ["andre"]];

     $c[0]["nome"];
     $c[1][0];

    $d = [[1, 2, 3], [["filmes" => ["vingadores", "ela é demais"]]]];

    $d[0][0];
    $d[0][1];
    $d[0][2];

     $d[1][0]["filmes"][0];

      $d[1][0]["filmes"][1];

    

    if ($_SESSION["usuario"]["adm"] == 1) {
       echo '<button><a href="criarusuario.html">Cadastrar Usuarios </a></button>';
    }else {
        echo "";
    }


    ?>
    <br>
       <button><a href="logout.php">Sair</a></button> 
    
    

    
</body>
</html>