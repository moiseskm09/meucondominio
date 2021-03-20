<?php
$host = "ns954.hostgator.com.br";
$user = "qually83_bemksolucoes";
$pass = "bemk@2021";
$banco = "qually83_meucondominio";

$conexao = mysqli_connect ($host, $user, $pass) or die (mysqli_error("falha na conexao"));
mysqli_set_charset($conexao, "utf-8");
mysqli_select_db($conexao, $banco) or die (mysqli_error("banco de dados nao encontrado"));
