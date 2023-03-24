<?php
    include("db.php");


    $id =$_GET['id'];

    $deletartarefa = $db->query("DELETE FROM tarefas  WHERE id = {$id}");
    if ($deletartarefa) {
        
            header("location: index.php");
            exit;
        
    }else{
        echo $db->error;
        exit("deu errado");

    }
