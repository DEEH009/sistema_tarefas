<?php
   include("db.php");

   $tarefa = $_POST["tarefa"];
   $id_user = $_SESSION["usuario"]["id"];
  
    $criartarefa = $db->query("INSERT INTO tarefas (tarefa,id_user) VALUES ('{$tarefa}','{$id_user}' ) "); 
    if (!$criartarefa) {
        echo $db->error;
        exit;
    }    

    header("location: index.php");
    exit;
   // var_dump($criartarefa);
    
   

