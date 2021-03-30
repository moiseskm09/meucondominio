<?php
require_once '../config/conexao.php';

if(isset($_GET['reprovaUserCod'])){
    $cod_usuario = $_GET['reprovaUserCod'];
    $sql_aprovacao = mysqli_query($conexao, "UPDATE morador SET m_status = 3 WHERE m_cod = '$cod_usuario'");
    header("location: ../sistema/aprova-usuarios.php?aprovacao=2");
    
}