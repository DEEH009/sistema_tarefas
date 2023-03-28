<?php
    include ("db.php");
    
    $nome_email = $_POST["nome_email"];
    $senha = $_POST["senha"];

$buscaruseuarios = $db->query("SELECT * FROM users WHERE (nome ='{$nome_email}' OR email ='{$nome_email}')  AND senha ='{$senha}' AND ativo = 1 ");
    //var_dump($buscaruseuarios);
   // exit;
    if ($buscaruseuarios) {
        if ($buscaruseuarios->num_rows === 0) {
            $_SESSION["usuario_logado"] = false;
            header("location: criarusuario.html");
            exit;
        }else {
            while ($row = $buscaruseuarios->fetch_assoc())
             {
               $_SESSION["usuario"]["id"]  = $row["id"] ;
               $_SESSION["usuario"]["nome"] = $row["nome"]; 
               $_SESSION["usuario_logado"] = true;
               $_SESSION["usuario"]["adm"] = $row["adm"];
                         
            }
           
        }
    }else {
        echo $db->error;
        exit;
    }
    
   header("location: servico.php");
            exit;