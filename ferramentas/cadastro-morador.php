<?php

date_default_timezone_set('America/Sao_Paulo');
include_once '../config/conexao.php';

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$tipoDeMoradia = $_POST['tipoDeMoradia'];
$nomeImovel = $_POST['nomeImovel'];
$senha = md5($_POST['senha']);
$dataCadastro = date("Y-m-d H:i:s");

if (isset($nome, $sobrenome, $cpf, $email, $telefone, $tipoDeMoradia, $nomeImovel, $senha)) {
    $consulta_m_cpf = mysqli_query($conexao, "SELECT m_cpf FROM morador WHERE m_cpf = '$cpf'");
    if (mysqli_num_rows($consulta_m_cpf) >= 1) {
        header("location: ../index.php?erro=2");
    } else if (mysqli_num_rows($consulta_m_cpf) >= 1) {
        $consulta_m_email = mysqli_query($conexao, "SELECT m_email FROM morador WHERE m_email = '$email'");
        header("location: ../index.php?erro=3");
    } else {
        $insere_morador = mysqli_query($conexao, "INSERT INTO morador (m_nome, m_sobrenome, m_cpf, m_email, m_telefone, m_tipomoradia, m_nomeimovel, m_senha, m_datacadastro, m_status) VALUES ('$nome', '$sobrenome', '$cpf', '$email', '$telefone', '$tipoDeMoradia', '$nomeImovel', '$senha', '$dataCadastro', '2')");
        header("location: ../index.php?sucesso=1");
    }
}