<?php
require_once '../config/conexao.php';
require_once '../config/config_geral.php';

session_start();
$codInfoAdd = $_SESSION["cod"];

$sqlBuscaInfo = mysqli_query($conexao, "SELECT * FROM morador WHERE m_cod = '$codInfoAdd'");
$resultadoBuscaInfo = mysqli_fetch_assoc($sqlBuscaInfo);


?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="../css/menu.css" rel="stylesheet" />
        <link href="../css/geral.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/bootstrap.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/mask.js"></script>
        <script src="../js/busca-cep.js"></script>
        <style>
            .tamanhoInput{ 
    height: 40px; 
    border-radius: 10px; 
    font-size: 16px;
    font-weight: 400;
}

.tamanhoInput:focus {
  background-color: #cbd3da;
  box-shadow: 0px 0px 5px #EB0FA5;
  border: none;
  font-weight: 600;
  color: #023246;
  
}
        </style>
    </head>
    <body style="background-color: #f8f9fa">
        <?php include_once "../ferramentas/navbar.php"; ?>
                    <div class="container-fluid">
                        <div class="header mt-3 mb-3">
                        <h4 class="text-center">Olá <span class="destaque"><?php echo $resultadoBuscaInfo['m_nome']; ?></span>, precisamos que preencha as informações abaixo!</h4>   
                        </div>
                        <form>
  <div class="form-row">
      <div class="form-group col-md-12">
          <label for="condominio">Nome do Condomínio <span class="text-danger">*</span></label>
      <input type="text" class="form-control tamanhoInput" id="condominio" name="condominio" value="<?php echo $resultadoBuscaInfo['m_nomeimovel']; ?>" required>
    </div>
      <div class="form-group col-md-4">
      <label for="tipomoradia">Tipo de Imóvel <span class="text-danger">*</span></label>
      <input type="text" class="form-control tamanhoInput" id="tipomoradia" name="tipomoradia" value="<?php echo $resultadoBuscaInfo['m_tipomoradia']; ?>" required>
    </div>
      <div class="form-group col-md-4">
      <label for="apartamento">Apartamento <span class="text-danger">*</span></label>
      <input type="text" class="form-control tamanhoInput" id="apartamento" name="apartamento" Placeholder="Ex: 3A" required>
    </div>
      <div class="form-group col-md-4">
      <label for="tipoInquilino">Você é? <span class="text-danger">*</span></label>
      <select id="tipoInquilino" name="tipoInquilino" class="form-control tamanhoInput" required>
        <option selected>Escolha uma opção ...</option>
        <option value="Proprietário">Proprietário(a)</option>
        <option value="Locatário">Locatário(a)</option>
      </select>
    </div>
      <div class="form-group col-md-12">
      <label for="nome">Nome Completo<span class="text-danger">*</span></label>
      <input type="text" class="form-control tamanhoInput" id="nome" name="nome" value="<?php echo $resultadoBuscaInfo['m_nome']." ".$resultadoBuscaInfo['m_sobrenome']; ?>" required>
    </div>
      <div class="form-group col-md-4">
      <label for="rg">RG <span class="text-danger">*</span></label>
      <input type="text" class="form-control rg tamanhoInput" id="rg" name="rg" Placeholder="00.000.000-0" required>
    </div>
      <div class="form-group col-md-4">
      <label for="cpf">CPF <span class="text-danger">*</span></label>
      <input type="text" class="form-control cpf tamanhoInput" id="cpf" name="cpf" value="<?php echo $resultadoBuscaInfo['m_cpf']; ?>" required>
    </div>
      <div class="form-group col-md-4">
      <label for="dataNascimento">Data de Nascimento <span class="text-danger">*</span></label>
      <input type="date" class="form-control tamanhoInput" id="dataNascimento" name="dataNascimento" required>
    </div>
    <div class="form-group col-md-3">
      <label for="email">Email <span class="text-danger">*</span></label></label>
      <input type="email" class="form-control tamanhoInput" id="email" name="email" value="<?php echo $resultadoBuscaInfo['m_email']; ?>" required>
    </div>
      <div class="form-group col-md-3">
      <label for="telCelular">Tel. Celular <span class="text-danger">*</span></label></label>
      <input type="tel" class="form-control phone_with_ddd tamanhoInput" id="telCelular" name="telCelular" value="<?php echo $resultadoBuscaInfo['m_telefone']; ?>" required>
    </div>
      <div class="form-group col-md-3">
      <label for="telResidencial">Tel. Residencial</label>
      <input type="tel" class="form-control phone tamanhoInput" id="telResidencial" name="telResidencial" placeholder="(21) 4444-4444">
    </div>
      <div class="form-group col-md-3">
      <label for="telComercial">Tel. Comercial</label>
      <input type="tel" class="form-control phone tamanhoInput" id="telComercial" name="telComercial" placeholder="(21) 4444-4444">
    </div>
          <div class="form-group col-md-2">
      <label for="cep">CEP</label>
      <input type="text" class="form-control cep tamanhoInput" id="cep" name="cep" type="search" maxlength="8" required>
    </div>
      <div class="form-group col-md-2 mt-2">
          <br>
          <button type="button" class="btn btn-primary" onclick="pesquisacep(cep.value)">Preencher campos</button>
    </div>
  </div>
  <div class="form-row">
        <div class="form-group col-md-10">
    <label for="endereco">Endereço <span class="text-danger">*</span></label>
    <input type="text" class="form-control tamanhoInput" id="endereco" name="endereco" readonly required>
  </div>
        <div class="form-group col-md-2">
    <label for="numeroCasa">Número <span class="text-danger">*</span></label>
    <input type="text" class="form-control tamanhoInput" id="numeroCasa" name="numeroCasa" placeholder="Ex. 0" required>
  </div>
    <div class="form-group col-md-4">
      <label for="bairro">Bairro <span class="text-danger">*</span></label>
      <input type="text" class="form-control tamanhoInput" id="bairro" name="bairro" readonly required>
    </div>
      <div class="form-group col-md-4">
      <label for="cidade">Cidade <span class="text-danger">*</span></label>
      <input type="text" class="form-control tamanhoInput" id="cidade" name="cidade" readonly required>
    </div>
      <div class="form-group col-md-4">
      <label for="estado">Estado <span class="text-danger">*</span></label>
      <input type="text" class="form-control tamanhoInput" id="estado" name="estado" readonly required>
    </div>
    
    
  </div>

                                                <div class="header mt-3 mb-3">
                        <h4 class="text-center">Já estamos quase acabando! Quem mora com você?</h4>   
                        </div>
                        <div class="alert alert-warning">
                            Caso não more com mais ninguém, deixe os campos abaixo em branco!
                        </div>
                        <div class="form-row">
      <div class="form-group col-md-6">
          <label for="nomemorador1">Nome Completo</label>
      <input type="text" class="form-control tamanhoInput" id="nomemorador1" name="nomemorador1">
    </div>
                            <div class="form-group col-md-3">
      <label for="parentesco1">Parentesco</label>
      <select id="parentesco1" name="parentesco1" class="form-control tamanhoInput">
        <option selected>Escolha uma opção ...</option>
        <option value="Pai">Pai</option>
        <option value="Mãe">Mãe</option>
        <option value="Avô">Avô</option>
        <option value="Avó">Avó</option>
        <option value="Filho">Filho(a)</option>
        <option value="Tio">Tio(a)</option>
        <option value="Primo">Primo(a)</option>
        <option value="Amigo">Amigo(a)</option>
      </select>
    </div>
                            <div class="form-group col-md-3">
      <label for="dataNascimento1">Data de Nascimento</label>
      <input type="date" class="form-control tamanhoInput" id="dataNascimento1" name="dataNascimento1">
    </div>
                        </div>
                        <div class="form-row">
      <div class="form-group col-md-6">
          <label for="nomemorador2">Nome Completo</label>
      <input type="text" class="form-control tamanhoInput" id="nomemorador2" name="nomemorador2">
    </div>
                            <div class="form-group col-md-3">
      <label for="parentesco2">Parentesco</label>
      <select id="parentesco2" name="parentesco2" class="form-control tamanhoInput">
        <option selected>Escolha uma opção ...</option>
        <option value="Pai">Pai</option>
        <option value="Mãe">Mãe</option>
        <option value="Avô">Avô</option>
        <option value="Avó">Avó</option>
        <option value="Filho">Filho(a)</option>
        <option value="Tio">Tio(a)</option>
        <option value="Primo">Primo(a)</option>
        <option value="Amigo">Amigo(a)</option>
      </select>
    </div>
                            <div class="form-group col-md-3">
      <label for="dataNascimento2">Data de Nascimento</label>
      <input type="date" class="form-control tamanhoInput" id="dataNascimento2" name="dataNascimento2">
    </div>
                        </div>
                        <div class="form-row">
      <div class="form-group col-md-6">
          <label for="nomemorador3">Nome Completo</label>
      <input type="text" class="form-control tamanhoInput" id="nomemorador3" name="nomemorador3">
    </div>
                            <div class="form-group col-md-3">
      <label for="parentesco3">Parentesco</label>
      <select id="parentesco3" name="parentesco3" class="form-control tamanhoInput">
        <option selected>Escolha uma opção ...</option>
        <option value="Pai">Pai</option>
        <option value="Mãe">Mãe</option>
        <option value="Avô">Avô</option>
        <option value="Avó">Avó</option>
        <option value="Filho">Filho(a)</option>
        <option value="Tio">Tio(a)</option>
        <option value="Primo">Primo(a)</option>
        <option value="Amigo">Amigo(a)</option>
      </select>
    </div>
                            <div class="form-group col-md-3">
      <label for="dataNascimento3">Data de Nascimento</label>
      <input type="date" class="form-control tamanhoInput" id="dataNascimento3" name="dataNascimento3">
    </div>
                        </div>
                        <div class="form-row">
      <div class="form-group col-md-6">
          <label for="nomemorador4">Nome Completo</label>
      <input type="text" class="form-control tamanhoInput" id="nomemorador4" name="nomemorador4">
    </div>
                            <div class="form-group col-md-3">
      <label for="parentesco4">Parentesco</label>
      <select id="parentesco4" name="parentesco4" class="form-control tamanhoInput">
        <option selected>Escolha uma opção ...</option>
        <option value="Pai">Pai</option>
        <option value="Mãe">Mãe</option>
        <option value="Avô">Avô</option>
        <option value="Avó">Avó</option>
        <option value="Filho">Filho(a)</option>
        <option value="Tio">Tio(a)</option>
        <option value="Primo">Primo(a)</option>
        <option value="Amigo">Amigo(a)</option>
      </select>
    </div>
                            <div class="form-group col-md-3">
      <label for="dataNascimento4">Data de Nascimento</label>
      <input type="date" class="form-control tamanhoInput" id="dataNascimento4" name="dataNascimento4" >
    </div>
                        </div>
                        <div class="header mt-3 mb-3">
                        <h4 class="text-center">Quase lá! Tem algum empregado?</h4>   
                        </div>
                        <div class="alert alert-warning">
                            Caso não tenha, deixe os campos abaixo em branco!
                        </div>
                        <div class="form-row">
      <div class="form-group col-md-8">
          <label for="empregado1">Nome Completo</label>
      <input type="text" class="form-control tamanhoInput" id="empregado1" name="empregado1">
    </div>
                            <div class="form-group col-md-4">
      <label for="rg1">RG</label>
      <input type="text" class="form-control rg tamanhoInput" id="rg1" name="rg1" Placeholder="00.000.000-0">
    </div>
   
                        </div>
                                            <div class="form-row">
      <div class="form-group col-md-8">
          <label for="empregado2">Nome Completo</label>
      <input type="text" class="form-control tamanhoInput" id="empregado2" name="empregado2">
    </div>
                            <div class="form-group col-md-4">
      <label for="rg2">RG</label>
      <input type="text" class="form-control rg tamanhoInput" id="rg2" name="rg2" Placeholder="00.000.000-0">
    </div>
   
                        </div>
                                                <div class="header mt-3 mb-3">
                        <h4 class="text-center">Falta pouco! Algum veículo?</h4>   
                        </div>
                        <div class="alert alert-warning">
                            Caso não tenha, deixe os campos abaixo em branco!
                        </div>
                                                                    <div class="form-row">
      <div class="form-group col-md-4">
          <label for="modeloVeiculo">Marca/Modelo</label>
      <input type="text" class="form-control tamanhoInput" id="modeloVeiculo" name="modeloVeiculo">
    </div>
      <div class="form-group col-md-4">
          <label for="corVeiculo">Cor</label>
      <input type="text" class="form-control tamanhoInput" id="corVeiculo" name="corVeiculo">
    </div>
                                                                        <div class="form-group col-md-4">
          <label for="placaVeiculo">Placa</label>
      <input type="text" class="form-control tamanhoInput" id="placaVeiculo" name="placaVeiculo">
    </div>

   
                        </div>
                        <div class="form-row">
      <div class="form-group col-md-4">
          <label for="modeloVeiculo2">Marca/Modelo</label>
      <input type="text" class="form-control tamanhoInput" id="modeloVeiculo2" name="modeloVeiculo2">
    </div>
      <div class="form-group col-md-4">
          <label for="corVeiculo2">Cor</label>
      <input type="text" class="form-control tamanhoInput" id="corVeiculo2" name="corVeiculo2">
    </div>
                                                                        <div class="form-group col-md-4">
          <label for="placaVeiculo2">Placa</label>
      <input type="text" class="form-control tamanhoInput" id="placaVeiculo2" name="placaVeiculo2">
    </div>

   
                        </div>
                        <div class="form-row">
      <div class="form-group col-md-4">
          <label for="modeloVeiculo3">Marca/Modelo</label>
      <input type="text" class="form-control tamanhoInput" id="modeloVeiculo3" name="modeloVeiculo3">
    </div>
      <div class="form-group col-md-4">
          <label for="corVeiculo3">Cor</label>
      <input type="text" class="form-control tamanhoInput" id="corVeiculo3" name="corVeiculo3">
    </div>
                                                                        <div class="form-group col-md-4">
          <label for="placaVeiculo3">Placa</label>
      <input type="text" class="form-control tamanhoInput" id="placaVeiculo3" name="placaVeiculo3">
    </div>

   
                        </div>
                        
                                               <div class="header mt-3 mb-3">
                        <h4 class="text-center">Este é o último! Animais de estimação?</h4>   
                        </div>
                        <div class="alert alert-warning">
                            Caso não tenha, deixe os campos abaixo em branco!
                        </div>
                        
                         <div class="form-row">
      <div class="form-group col-md-6">
          <label for="Especie">Espécie</label>
      <input type="text" class="form-control tamanhoInput" id="Especie" name="Especie">
    </div>
      <div class="form-group col-md-6">
          <label for="quantidade">Quantidade</label>
      <input type="number" class="form-control tamanhoInput" id="quantidade" name="quantidade">
    </div>

   
                        </div>
                        <div class="form-row">
      <div class="form-group col-md-6">
          <label for="Especie2">Espécie</label>
      <input type="text" class="form-control tamanhoInput" id="Especie2" name="Especie2">
    </div>
      <div class="form-group col-md-6">
          <label for="quantidade2">Quantidade</label>
      <input type="number" class="form-control tamanhoInput" id="quantidade2" name="quantidade2">
    </div>

   
                        </div>
                        
                        <div class="alert alert-info" style="font-size: 18px;">
                            As informações acima constituem a expressão da verdade pelos quais me comprometo, e eventuais
                            alterações serão por mim comunicadas imediatamente.<br>
                            Mantenha seu cadastro sempre atualizado e colabore com o dia a dia do seu condomínio.

                        </div>
                        <div class="form-group mb-3">
                        <input type="submit" class="btn btn-success form-control" value="Finalizar cadastro">
                        </div>
                            </form>
                        <!--fim conteudo da tela aqui!-->

                <?php include_once "../ferramentas/rodape.php"; ?>

        </div>
        <script src="../js/cp_mascaras.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>