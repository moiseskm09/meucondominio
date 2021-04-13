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

    </head>
    <body style="background-color: #f8f9fa">
        <?php include_once "../ferramentas/navbar.php"; ?>
                    <div class="container-fluid">
                        <div class="header mt-3 mb-3">
                        <h6 class="text-center">Olá <span class="destaque"><?php echo $resultadoBuscaInfo['m_nome']; ?></span>, precisamos que preencha as informações abaixo!</h6>   
                        </div>
                        <form>
  <div class="form-row">
      <div class="form-group col-md-12">
          <label for="condominio">Nome do Condomínio <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="condominio" name="condominio" value="<?php echo $resultadoBuscaInfo['m_nomeimovel']; ?>">
    </div>
      <div class="form-group col-md-4">
      <label for="tipomoradia">Tipo de imóvel <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="tipomoradia" name="tipomoradia" value="<?php echo $resultadoBuscaInfo['m_tipomoradia']; ?>">
    </div>
      <div class="form-group col-md-4">
      <label for="apartamento">Apartamento <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="apartamento" name="apartamento" Placeholder="Ex: 3A">
    </div>
      <div class="form-group col-md-4">
      <label for="tipoInquilino">Você é? <span class="text-danger">*</span></label>
      <select id="tipoInquilino" class="form-control">
        <option selected>Escolha uma opção ...</option>
        <option value="Proprietário">Proprietário(a)</option>
        <option value="Locatário">Locatário(a)</option>
      </select>
    </div>
      <div class="form-group col-md-12">
      <label for="nome">Nome <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $resultadoBuscaInfo['m_nome']; ?>">
    </div>
      <div class="form-group col-md-4">
      <label for="rg">RG <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="rg" name="rg" Placeholder="00.000.000-0">
    </div>
      <div class="form-group col-md-4">
      <label for="cpf">CPF <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $resultadoBuscaInfo['m_cpf']; ?>">
    </div>
      <div class="form-group col-md-4">
      <label for="dataNascimento">Data de Nascimento <span class="text-danger">*</span></label>
      <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" >
    </div>
    <div class="form-group col-md-3">
      <label for="email">Email <span class="text-danger">*</span></label></label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $resultadoBuscaInfo['m_email']; ?>">
    </div>
      <div class="form-group col-md-3">
      <label for="telCelular">Tel. Celular <span class="text-danger">*</span></label></label>
      <input type="tel" class="form-control" id="telCelular" name="telCelular" value="<?php echo $resultadoBuscaInfo['m_telefone']; ?>">
    </div>
      <div class="form-group col-md-3">
      <label for="telResidencial">Tel. Residencial</label>
      <input type="tel" class="form-control" id="telResidencial" name="telResidencial" placeholder="(21) 4444-4444">
    </div>
      <div class="form-group col-md-3">
      <label for="telComercial">Tel. Comercial</label>
      <input type="tel" class="form-control" id="telComercial" name="telComercial" placeholder="(21) 4444-4444">
    </div>
          <div class="form-group col-md-2">
      <label for="cep">CEP</label>
      <input type="text" class="form-control" id="cep" name="cep">
    </div>
      <div class="form-group col-md-2 mt-2">
          <br>
      <button class="btn btn-primary">Preencher campos</button>
    </div>
  </div>
  <div class="form-row">
        <div class="form-group col-md-10">
    <label for="endereco">Endereço <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="inputAddress" readonly>
  </div>
        <div class="form-group col-md-2">
    <label for="inputAddress">Número <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Ex. 0">
  </div>
    <div class="form-group col-md-4">
      <label for="inputCity">Cidade <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="inputCity" readonly>
    </div>
      <div class="form-group col-md-4">
      <label for="inputCity">Bairro <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="inputCity" readonly>
    </div>
      <div class="form-group col-md-4">
      <label for="inputCity">Estado <span class="text-danger">*</span></label>
      <input type="text" class="form-control" id="inputCity" readonly>
    </div>
    
    
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