<?php

//Credenciais de acesso ao BD
define('HOST', 'ns954.hostgator.com.br');
define('USER', 'qually83_bemksolucoes');
define('PASS', 'bemk@2021');
define('DBNAME', 'qually83_meucondominio');

$conn = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);