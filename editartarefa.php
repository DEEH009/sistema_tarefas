<?php
    include("db.php");

    $tarefa =$_POST['novaTarefa'];
    $id = $_POST['id'];
    
    $editartarefa = $db->query("UPDATE  tarefas SET tarefa = '{$tarefa}' WHERE id ='{$id}' ");
    //var_dump($editartarefa);
   // exit;
        if ($editartarefa) {
               
            header("location: index.php");
            exit;
        
    }else{
        echo $db->error;
        exit("deu errado");

    }
        