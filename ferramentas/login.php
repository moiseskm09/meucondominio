<?php
date_default_timezone_set('America/Sao_Paulo');
require_once 'conexao.php';

if(isset($_POST['email'], $_POST['senha'])){
    $emailLogin = $_POST['email'];
    $senhaLogin = md5($_POST['senha']);
    $sqlUsuario = mysqli_query($conexao, "SELECT email, senha, nome, sobrenome FROM usuarios WHERE email = '$emailLogin' and senha = '$senhaLogin'");
    $num_linhas = mysqli_num_rows($sqlUsuario);
    if($num_linhas == 1){
        $resultadoUsuario = mysqli_fetch_assoc($sqlUsuario);
	session_start();
	$_SESSION['email']=$resultadoUsuario['email'];
	$_SESSION['senha']=$resultadoUsuario['senha'];
	$_SESSION['nome']=$resultadoUsuario['nome'];
	header("Location: ../sistema/home.php");
    }else if($num_linhas == 0){
        $sqlMorador = mysqli_query($conexao, "SELECT m_email, m_senha, m_nome, m_sobrenome, m_status FROM morador WHERE m_email = '$emailLogin' and m_senha = '$senhaLogin'");
    $num_linhasMorador = mysqli_num_rows($sqlMorador);
    $resultadoMorador = mysqli_fetch_assoc($sqlMorador);
    $m_status = $resultadoMorador['m_status'];
    if($num_linhasMorador == 1 && $m_status == 1){
        session_start();
	$_SESSION['email']=$resultadoMorador['m_email'];
	$_SESSION['senha']=$resultadoMorador['m_senha'];
	$_SESSION['nome']=$resultadoMorador['m_nome'];
	header("Location: ../sistema/home.php");
    }else if($num_linhasMorador == 1 && $m_status == 2){
        header("location: ../index.php?erro=4");
    }else if($num_linhasMorador == 0){
        header("location: ../index.php?erro=1");
    }
    }else {
         header("location: ../index.php?erro=1");
    }
}else {
   header("location: ../index.php?erro=1");
}
