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
$sqlAtualizaInformacoes  = mysqli_query($conexao, "UPDATE morador SET m_nomeimovel = '$nomeCondominio', m_tipomoradia = '$tipoImovel', m_apartamento = '$apartamento', m_tipoinquilino = '$tipoInquilino', m_nome = '$nome', m_sobrenome = '$sobrenome', m_rg = '$rg', m_cpf = '$cpf', m_datanascimento = '$dataNascimento', m_email = '$email', m_telefone = '$telCelular', m_telresidencial = '$telResidencial', m_telcomercial = '$telComercial', m_cep = '$cep', m_endereco = '$endereco', m_numerocasa = '$numeroCasa', m_bairro = '$bairro', m_cidade = '$cidade', m_estado = '$estado', info_preenchida = '1' WHERE m_cod = '$codMorador'");
   
if(isset($_POST['nomemorador'])) {
$nomemorador = $_POST['nomemorador'];
$parentesco = $_POST['parentesco'];
$nascimento = $_POST['dataNascimento'];
$sub_morador = $_POST['subcodMorador'];
function format($nomemorador, $parentesco, $nascimento, $sub_morador) {
  return "('{$nomemorador}', '{$parentesco}', '{$nascimento}', '{$sub_morador}')";
}
$valores = array_map("format", $nomemorador, $parentesco, $nascimento, $sub_morador);
$query = sprintf("INSERT INTO sub_moradores (subm_nome, subm_parentesco, subm_datanascimento, subm_codmorador) VALUES %s", join(', ', $valores));
$insereSubMoradores = mysqli_query($conexao, $query);
}

if(isset($_POST['empregado'])){
$empregado = $_POST['empregado'];
$rgempregado = $_POST['rgempregado'];
$cod_mempregado = $_POST['codmempregado'];
function empregado($empregado, $rgempregado, $cod_mempregado) {
  return "('{$empregado}', '{$rgempregado}', '{$cod_mempregado}' )";
}
$dados = array_map("empregado", $empregado, $rgempregado, $cod_mempregado);
$queryempregado = sprintf("INSERT INTO empregados (emp_nome, emp_rg, emp_codmorador) VALUES %s", join(', ', $dados));
$insereempregados = mysqli_query($conexao, $queryempregado);
}

if(isset($_POST['modeloVeiculo'])){
$modeloVeiculo = $_POST['modeloVeiculo'];
$corVeiculo = $_POST['corVeiculo'];
$placaVeiculo = $_POST['placaVeiculo'];
$codmveiculo = $_POST['codmveiculo'];

function veiculos($modeloVeiculo, $corVeiculo, $placaVeiculo, $codmveiculo) {
  return "('{$modeloVeiculo}', '{$corVeiculo}', '{$placaVeiculo}', '{$codmveiculo}' )";
}
$dados = array_map("veiculos", $modeloVeiculo, $corVeiculo, $placaVeiculo, $codmveiculo);
$queryveiculos = sprintf("INSERT INTO veiculos (v_modelo, v_placa, v_cor, v_codmorador) VALUES %s", join(', ', $dados));
$insereveiculos = mysqli_query($conexao, $queryveiculos);
}

if(isset($_POST['Especie'])){
$Especie = $_POST['Especie'];
$porte = $_POST['porte'];
$quantidade = $_POST['quantidade'];
$codmanimais = $_POST['codmanimais'];

function animais($Especie, $porte, $quantidade, $codmanimais) {
  return "('{$Especie}', '{$porte}', '{$quantidade}', '{$codmanimais}' )";
}
$dados = array_map("animais", $Especie, $porte, $quantidade, $codmanimais);
$queryanimais = sprintf("INSERT INTO animais (a_especie, a_porte, a_quantidade, a_codmorador) VALUES %s", join(', ', $dados));
$insereanimais = mysqli_query($conexao, $queryanimais);
}

    echo '<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
  <body>
   <div class="alert alert-success text-center" role="alert">
  <h3>Uhuuu! Deu tudo certo!<h3><br>
  <a href="../index.php" class="btn btn-success">Fazer Login</a>
</div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>';
    
}else {
    echo "erro";
}