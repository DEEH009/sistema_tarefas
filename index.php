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
    <title>home</title>
</head>

<body>

    
    <h1> Você está logado </h1>
    <?php
        echo "bem vindo {$_SESSION['usuario']['nome']}\n";
    ?>
    <h2> cadastro de tarefas</h2>
    <form method="post" action="tarefas.php">
    <input id ="tarefa" type="text" name="tarefa" autocomplete="off" class="input_tarefa" placeholder="Tarefas">
    <button type="submit">Cadastrar Tarefa </button>
    </form>

    <?php
        $buscarTarefas = $db->query("SELECT tarefa, id  FROM tarefas WHERE id_user = {$_SESSION['usuario']['id'] }");
        if ($buscarTarefas) {
            if ($buscarTarefas->num_rows > 0) {
                $tarefas = array();
                while ($row = $buscarTarefas->fetch_assoc()) {
                    $tarefas[] = $row;
                }
                
            }
        }
    
    ?>
        <table> 
            <thead>
                <th>Tarefas</th>
                <th>Ação</th>
            </thead>
            <tbody>
            <?php
        if (count($tarefas)) {
            foreach($tarefas as $tarefa){ 
                echo "<tr>
                            <form method='post' action='editartarefa.php'>
                            <td>
                                <input type ='text' name='novaTarefa' value='{$tarefa['tarefa']}'>
                                <input type ='hidden' name='id' value='{$tarefa['id']}'>
                            </td>
                            <td>
                                <button><a href='excluirtarefa.php?id={$tarefa['id']}'>Excluir</a>
                                <button type='submit'>Editar</a>
                            </td>
                            </form>
                        </tr>";
               // var_dump($tarefa);
            }           
      }   
    ?>
            </tbody>
        </table>
        <br>
   <button><a href="logout.php">Sair</a></button>    

</body>

<script >
    const input_tarefa = document.getElementById("tarefa");

    const callback_tarefa = async function(input){
        if (input_tarefa.value) {
           const response = await fetch("http://testes.local/buscar_tarefas_cadastradas.php?tarefa=" + input_tarefa.value) 
           const json     = await response.json();

           if (json.success) {
                input_tarefa.className = "input_sucesso"
            } else { 
                input_tarefa.className = "input_erro"
            }
        } else {
            input_tarefa.className = ""
        }
    }
    input_tarefa.addEventListener("keyup", callback_tarefa);
      
</script>
</html>