<?php
date_default_timezone_set('America/Sao_Paulo');
require_once '../config/conexao.php';

if(isset($_POST['email'], $_POST['senha'])){
    $emailLogin = $_POST['email'];
    $senhaLogin = md5($_POST['senha']);
    $sqlUsuario = mysqli_query($conexao, "SELECT email, senha, nome, sobrenome, user_nivel FROM usuarios WHERE email = '$emailLogin' and senha = '$senhaLogin'");
    $num_linhas = mysqli_num_rows($sqlUsuario);
    if($num_linhas == 1){
        $resultadoUsuario = mysqli_fetch_assoc($sqlUsuario);
	session_start();
	$_SESSION['email']=$resultadoUsuario['email'];
	$_SESSION['senha']=$resultadoUsuario['senha'];
	$_SESSION['nome']=$resultadoUsuario['nome'];
        $_SESSION['user_nivel']=$resultadoUsuario['user_nivel'];
	header("Location: ../sistema/home.php");
    }else if($num_linhas == 0){
        $sqlMorador = mysqli_query($conexao, "SELECT m_cod,m_email, m_senha, m_nome, m_sobrenome, m_status, info_preenchida, m_nivel FROM morador WHERE m_email = '$emailLogin' and m_senha = '$senhaLogin'");
    $num_linhasMorador = mysqli_num_rows($sqlMorador);
    $resultadoMorador = mysqli_fetch_assoc($sqlMorador);
    $m_status = $resultadoMorador['m_status'];
    $m_infoPreenchida = $resultadoMorador['info_preenchida'];
    if($num_linhasMorador == 1 && $m_status == 1 && $m_infoPreenchida == 1){
        session_start();
	$_SESSION['email']=$resultadoMorador['m_email'];
	$_SESSION['senha']=$resultadoMorador['m_senha'];
	$_SESSION['nome']=$resultadoMorador['m_nome'];
        $_SESSION['user_nivel']=$resultadoMorador['m_nivel'];
	header("Location: ../sistema/home.php");
    }else if($num_linhasMorador == 1 && $m_status == 1 && $m_infoPreenchida == 0){
        session_start();
	$_SESSION['nome']=$resultadoMorador['m_nome'];
        $_SESSION['cod']=$resultadoMorador['m_cod'];
	header("Location: ../sistema/info-adicionais.php");
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
