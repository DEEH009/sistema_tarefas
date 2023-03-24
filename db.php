<?php 
    session_start();

    $db = mysqli_connect("localhost","root","cpn#2010","pessoas",3306);
   
    if ($db->connect_error) {
        exit("falha ao conectar". $db->connect_error);
    }
   