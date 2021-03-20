<?php

date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d H:i');
include ("config/conexao.php");

session_start ();
$EMAIL = $_SESSION['email'];
$NOME = $_SESSION['nome'];
session_destroy();
header ("Location: ../index.php");
?>