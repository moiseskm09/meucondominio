<?php
require_once '../config/conexao.php';
require_once '../config/config_geral.php';

session_start();
$inquilino = $_GET['id'];

$sqlBuscaInfo = mysqli_query($conexao, "SELECT * FROM morador WHERE m_cod = '$inquilino'");
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
    </head>
    <body style="background-color: #ffffff">
<?php include_once "../ferramentas/navbar.php"; ?>
        <div class="container-fluid">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h2 class="titulo">Visualizando <?php echo $resultadoBuscaInfo['m_nome'];?></h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                            </div>
                        </div>
            <form id="formulario" method="POST" action="../ferramentas/adiciona-info-adicionais.php">
            <div class="form-row mt-3">
                            <div class="col-md-12">
                               <div class="accordion" id="selecioneperfil">
                                    <div class="card border-0 mb-2" style="border-radius: 10px;">
                                        <a href="#infoobrigatoria" data-toggle="collapse"  aria-expanded="true" aria-controls="informacoesObrigatorias" class="text-center header-filtro p-3 borda">Informações Obrigatórias</a>

                                        <div id="infoobrigatoria" class="collapse show" aria-labelledby="headingOne" data-parent="#infoobrigatoria">
                                            <div class="card-body card-fundo-body">
                                                <div class="form-row">
                    <input type="hidden" value="<?php echo $inquilino;?>" name="codMorador">
                    <div class="form-group col-md-6">
                        <label for="nome">Nome<span class="text-danger">*</span></label>
                        <input type="text" class="form-control tamanhoInput" id="nome" name="nome" value="<?php echo $resultadoBuscaInfo['m_nome']; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sobrenome">Sobrenome<span class="text-danger">*</span></label>
                        <input type="text" class="form-control tamanhoInput" id="sobrenome" name="sobrenome" value="<?php echo $resultadoBuscaInfo['m_sobrenome']; ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rg">RG <span class="text-danger">*</span></label>
                        <input type="text" class="form-control rg tamanhoInput" id="rg" name="rg" value="<?php echo $resultadoBuscaInfo['m_rg']; ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cpf">CPF <span class="text-danger">*</span></label>
                        <input type="text" class="form-control cpf tamanhoInput" id="cpf" name="cpf" value="<?php echo $resultadoBuscaInfo['m_cpf']; ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nascimento">Data de Nascimento <span class="text-danger">*</span></label>
                        <input type="date" class="form-control tamanhoInput" id="nascimento" name="nascimento" value="<?php echo $resultadoBuscaInfo['m_datanascimento']; ?>"required>
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
                        <input type="tel" class="form-control phone tamanhoInput" id="telResidencial" name="telResidencial" value="<?php echo $resultadoBuscaInfo['m_telresidencial']; ?>" placeholder="(21) 4444-4444">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="telComercial">Tel. Comercial</label>
                        <input type="tel" class="form-control phone tamanhoInput" id="telComercial" name="telComercial" placeholder="(21) 4444-4444" value="<?php echo $resultadoBuscaInfo['m_telcomercial']; ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control cep tamanhoInput" id="cep" name="cep" type="search" maxlength="8" required value="<?php echo $resultadoBuscaInfo['m_cep']; ?>">
                    </div>
                    <div class="form-group col-md-2 mt-2">
                        <br>
                        <button type="button" class="btn btn-primary" onclick="pesquisacep(cep.value)">Preencher campos</button>
                    </div>
                </div>
                                                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="endereco">Endereço <span class="text-danger">*</span></label>
                        <input type="text" class="form-control tamanhoInput" id="endereco" name="endereco" readonly required value="<?php echo $resultadoBuscaInfo['m_endereco']; ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="numeroCasa">Número <span class="text-danger">*</span></label>
                        <input type="text" class="form-control tamanhoInput" id="numeroCasa" name="numeroCasa" placeholder="Ex. 0" required value="<?php echo $resultadoBuscaInfo['m_numerocasa']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="bairro">Bairro <span class="text-danger">*</span></label>
                        <input type="text" class="form-control tamanhoInput" id="bairro" name="bairro" readonly value="<?php echo $resultadoBuscaInfo['m_bairro']; ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cidade">Cidade <span class="text-danger">*</span></label>
                        <input type="text" class="form-control tamanhoInput" id="cidade" name="cidade" readonly value="<?php echo $resultadoBuscaInfo['m_cidade']; ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="estado">Estado <span class="text-danger">*</span></label>
                        <input type="text" class="form-control tamanhoInput" id="estado" name="estado" readonly value="<?php echo $resultadoBuscaInfo['m_estado']; ?>" required>
                    </div>
                </div>
                                                
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
                <div class="form-row mt-3">
                            <div class="col-md-12">
                               <div class="accordion" id="infocomplementar">
                                    <div class="card border-0 mb-2" style="border-radius: 10px;">
                                        <a href="#informacaocomplementar" data-toggle="collapse"  aria-expanded="true" aria-controls="perfil" class="text-center header-filtro p-3 borda">Informações Complementares</a>

                                        <div id="informacaocomplementar" class="collapse show" aria-labelledby="headingOne" data-parent="#infocomplementar">
                                            <div class="card-body card-fundo-body">
                                                
                <div class="form-row">    
                    <div class="col-md-12 mb-2">
                        <h5 class="text-left text-primary">Moradores</h5>
                    </div>
                    <input type="hidden" value="<?php echo $inquilino;?>" id="vai" name="subcodMorador[]">
                    <?php
                    $buscaMoradores = mysqli_query($conexao, "SELECT * FROM sub_moradores WHERE subm_codmorador = '$inquilino'");
                    while($resultadoSubmorador = mysqli_fetch_assoc($buscaMoradores)){
                    ?>
                    <div class="form-group col-md-6">
                        <label for="nomemorador">Nome Completo</label>
                        <input type="text" class="form-control tamanhoInput" id="nomemorador" name="nomemorador[]" value="<?php echo $resultadoSubmorador['subm_nome']; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="parentesco">Parentesco</label>
                        <select id="parentesco" name="parentesco[]" class="form-control tamanhoInput">
                            <option selected><?php echo $resultadoSubmorador['subm_parentesco']; ?></option>
                            <option value="Pai">Pai</option>
                            <option value="Mãe">Mãe</option>
                            <option value="Avô">Avô</option>
                            <option value="Avó">Avó</option>
                            <option value="Filho">Filho(a)</option>
                            <option value="Tio">Tio(a)</option>
                            <option value="Primo">Primo(a)</option>
                            <option value="Amigo">Amigo(a)</option>
                            <option value="Outros">Outros</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input type="date" class="form-control tamanhoInput" id="dataNascimento" name="dataNascimento[]" value="<?php echo $resultadoSubmorador['subm_datanascimento']; ?>">
                    </div>
                    <?php 
                    }
                    ?>
                    <div class="col-md-12 mt-3 mb-2">
                        <h5 class="text-left text-primary">Empregados</h5>
                    </div>
                    
                    <input type="hidden" value="<?php echo $codInfoAdd;?>" id="codmempregado" name="codmempregado[]">
                    <div class="form-group col-md-7">
                        <label for="empregado">Nome Completo</label>
                        <input type="text" class="form-control tamanhoInput" id="empregado" name="empregado[]">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rgempregado">RG</label>
                        <input type="text" class="form-control rg tamanhoInput" id="rgempregado" name="rgempregado[]" Placeholder="00.000.000-0">
                    </div>
                    <div class="form-group col-md-1 mt-2">
                        <br>
                        <button type="button" class="btn btn-primary" id="btnempregado"><i class="fa fa-plus"></i></button>
                    </div>

                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
            </form>
            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>            <br>
             <div class="form-row">
                    <input type="hidden" value="<?php echo $codInfoAdd;?>" name="codMorador">
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
                    <div class="form-group col-md-6">
                        <label for="nome">Nome<span class="text-danger">*</span></label>
                        <input type="text" class="form-control tamanhoInput" id="nome" name="nome" value="<?php echo $resultadoBuscaInfo['m_nome']; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sobrenome">Sobrenome<span class="text-danger">*</span></label>
                        <input type="text" class="form-control tamanhoInput" id="sobrenome" name="sobrenome" value="<?php echo $resultadoBuscaInfo['m_sobrenome']; ?>" required>
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
                        <label for="nascimento">Data de Nascimento <span class="text-danger">*</span></label>
                        <input type="date" class="form-control tamanhoInput" id="nascimento" name="nascimento" required>
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

                <div class="header mt-5 mb-1">
                    <h4 class="text-center">Já estamos quase acabando! Quem mora com você?</h4>   
                </div>
                <p class="text-right destaque mb-3"> Caso não tenha, deixe os campos em branco!</p>

                <div class="form-row">        
                    <input type="hidden" value="<?php echo $codInfoAdd;?>" id="vai" name="subcodMorador[]">
                    <div class="form-group col-md-5">
                        <label for="nomemorador">Nome Completo</label>
                        <input type="text" class="form-control tamanhoInput" id="nomemorador" name="nomemorador[]">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="parentesco">Parentesco</label>
                        <select id="parentesco" name="parentesco[]" class="form-control tamanhoInput">
                            <option selected>Escolha uma opção ...</option>
                            <option value="Pai">Pai</option>
                            <option value="Mãe">Mãe</option>
                            <option value="Avô">Avô</option>
                            <option value="Avó">Avó</option>
                            <option value="Filho">Filho(a)</option>
                            <option value="Tio">Tio(a)</option>
                            <option value="Primo">Primo(a)</option>
                            <option value="Amigo">Amigo(a)</option>
                            <option value="Outros">Outros</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input type="date" class="form-control tamanhoInput" id="dataNascimento" name="dataNascimento[]">
                    </div>
                    <div class="form-group col-md-1 mt-2">
                        <br>
                        <button type="button" id="btnmorador" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div id="morador">
                </div>

                <div class="header mt-5 mb-1">
                    <h4 class="text-center">Quase lá! Tem algum empregado?</h4>   
                </div>
                <p class="text-right destaque"> Caso não tenha, deixe os campos em branco!</p>
                <div class="form-row">
                    <input type="hidden" value="<?php echo $codInfoAdd;?>" id="codmempregado" name="codmempregado[]">
                    <div class="form-group col-md-7">
                        <label for="empregado">Nome Completo</label>
                        <input type="text" class="form-control tamanhoInput" id="empregado" name="empregado[]">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rgempregado">RG</label>
                        <input type="text" class="form-control rg tamanhoInput" id="rgempregado" name="rgempregado[]" Placeholder="00.000.000-0">
                    </div>
                    <div class="form-group col-md-1 mt-2">
                        <br>
                        <button type="button" class="btn btn-primary" id="btnempregado"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
<div id="empregados">
                </div>
                
                <div class="header mt-5 mb-1">
                    <h4 class="text-center">Falta pouco! Algum veículo?</h4>   
                </div>
                <p class="text-right destaque"> Caso não tenha, deixe os campos em branco!</p>
                <div class="form-row">
                    <input type="hidden" value="<?php echo $codInfoAdd;?>" id="codmveiculo" name="codmveiculo[]">
                    <div class="form-group col-md-5">
                        <label for="modeloVeiculo">Marca/Modelo</label>
                        <input type="text" class="form-control tamanhoInput" id="modeloVeiculo" name="modeloVeiculo[]">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="corVeiculo">Cor</label>
                        <input type="text" class="form-control tamanhoInput" id="corVeiculo" name="corVeiculo[]">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="placaVeiculo">Placa</label>
                        <input type="text" class="form-control tamanhoInput placa" id="placaVeiculo" name="placaVeiculo[]" maxlength="7">
                    </div>
                    <div class="form-group col-md-1 mt-2">
                        <br>
                        <button type="button" class="btn btn-primary" id="btnveiculo"><i class="fa fa-plus"></i></button>
                    </div>
                </div>    
                <div id="veiculos"></div>
                
                <div class="header mt-5 mb-1">
                    <h4 class="text-center">Este é o último, prometo! Animais de estimação?</h4>   
                </div>
                <p class="text-right destaque"> Caso não tenha, deixe os campos em branco!</p>

                <div class="form-row mb-4">
                    <input type="hidden" value="<?php echo $codInfoAdd;?>" id="codmanimais" name="codmanimais[]">
                    <div class="form-group col-md-5">
                        <label for="Especie">Espécie</label>
                        <input type="text" class="form-control tamanhoInput" id="Especie" name="Especie[]">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="porte">Porte</label>
                        <select id="porte" name="porte[]" class="form-control tamanhoInput">
                            <option selected>Escolha uma opção ...</option>
                            <option value="Pequeno">Pequeno</option>
                            <option value="Médio">Médio</option>
                            <option value="Grande">Grande</option>

                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" class="form-control tamanhoInput" id="quantidade" name="quantidade[]">
                    </div>
                    <div class="form-group col-md-1 mt-2">
                        <br>
                        <button type="button" class="btn btn-primary" id="btnanimal"><i class="fa fa-plus"></i></button>
                    </div>
                </div>

                <div id="animais"></div>

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
        <script src="../js/campos_adicionais.js"></script>
        <script src="../js/cp_mascaras.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>