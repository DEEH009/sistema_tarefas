<?php
include("db.php");

if (isset($_SESSION["usuario_logado"]) || $_SESSION["usuario_logado"] === true) {
    $_SESSION["usuario_logado"] = false;
    header("location: index.php");
    exit;

}