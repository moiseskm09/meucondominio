<?php

//verifica se a sessão é valida
session_cache_expire(3);
$cache_expire = session_cache_expire();

session_start();

session_regenerate_id();
// Define sessão para o usuário logado
$EMAIL = $_SESSION["email"];
$NOME = $_SESSION["nome"];


if (!isset($EMAIL) || !isset ($NOME) ) {
	header("Location: ../index.php");
	exit;
} else {
}