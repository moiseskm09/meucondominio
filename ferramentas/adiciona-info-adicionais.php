<?php
include_once '../config/conexao.php';

$codMorador = $_POST['codMorador'];
$nomeCondominio = $_POST['condominio'];
$tipoImovel = $_POST['tipomoradia'];
$apartamento = $_POST['apartamento'];
$tipoInquilino = $_POST['tipoInquilino'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'];
$dataNascimento = $_POST['nascimento'];
$email = $_POST['email'];
$telCelular = $_POST['telCelular'];
$telResidencial = $_POST['telResidencial'];
$telComercial = $_POST['telComercial'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numeroCasa = $_POST['numeroCasa'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

if(isset ($nomeCondominio, $tipoImovel, $apartamento, $tipoInquilino, $nome, $sobrenome, $rg, $cpf, $email, $telCelular, $cep, $endereco, $numeroCasa, $bairro, $cidade, $estado)){
$sqlAtualizaInformacoes  = mysqli_query($conexao, "UPDATE morador SET m_nomeimovel = '$nomeCondominio', m_tipomoradia = '$tipoImovel', m_apartamento = '$apartamento', m_tipoinquilino = '$tipoInquilino', m_nome = '$nome', m_sobrenome = '$sobrenome', m_rg = '$rg', m_cpf = '$cpf', m_datanascimento = '$dataNascimento', m_email = '$email', m_telefone = '$telCelular', m_telresidencial = '$telResidencial', m_telcomercial = '$telComercial', m_cep = '$cep', m_endereco = '$endereco', m_numerocasa = '$numeroCasa', m_bairro = '$bairro', m_cidade = '$cidade', m_estado = '$estado' WHERE m_cod = '$codMorador'");
    
    echo "Todos os campos estão preenchidos";
    
}else {
    echo "erro";
}