<?php
require_once '../config/conexao.php';

if(isset($_GET['aprovaUserCod'])){
    $cod_usuario = $_GET['aprovaUserCod'];
    $sql_aprovacao = mysqli_query($conexao, "UPDATE morador SET m_status = 1 WHERE m_cod = '$cod_usuario'");
    header("location: ../sistema/aprova-usuarios.php?aprovacao=1");
    
}