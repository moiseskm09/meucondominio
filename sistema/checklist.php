<?php
require_once '../config/sessao.php';
require_once '../config/conexao.php';
require_once '../config/config_geral.php';
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
        <script src="../js/loading.js"></script>
             <style>
            .tamanhoInput{ 
                height: 40px; 
                border-radius: 10px; 
                font-size: 16px;
                font-weight: 500;
                background-color: #cbd3da;
                color:#023246;
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
    <body class="sb-nav-fixed">
        <?php include_once "../ferramentas/navbar.php"; ?>
        <div id="layoutSidenav">
            <?php include_once "../ferramentas/menu.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <!--conteudo da tela aqui!-->
                        <div class="form-row mt-3 border">
                            <div class="col-md-3">
                                <img src="../img/Logo_quallyplan.svg" height="100">
                            </div>
                            <div class="col-md-6 text-center">
                                <p><span class="font-weight-bold">QUALLYPLAN SERVIÇOS PATRIMÔNIAIS</span><br>00.000.000/0000-00 - R. DR. CELESTINO, 26<br>NITERÓI - RIO DE JANEIRO - RJ CEP: 24026-900<br> Tel: (21) 2018-1767 - contato@quallyplan.com.br - quallyplan.com.br</p>
                            </div>
                            <div class="col-md-3">
                                <div class="numeroCheckList float-right" style="padding: 5px;">
                                    <h6 class="text-center mt-2">Check List</h6>
                                    <p class="text-center">Nº <span class="font-weight-bold destaque" style="font-size: 20px;">1</span></p>
                                </div>
                            </div>
                        </div>
                        <form method="POST">
                            <div class="form-row border">
                                <div class="text-center col-md-12 mt-3 destaque"><h4>DADOS DO CLIENTE</h4></div>
                                <div class="form-group col-md-12 mt-2">
                                    <input type="text" class="form-control tamanhoInput" id="cliente" name="cliente" placeholder="Nome Cliente">
                                </div>

                                <div class="text-center col-md-12 mt-3 destaque"><h4>DADOS DO VISTORIADOR</h4></div>

                                <div class="form-group col-md-6 mt-2">
                                    <input type="text" class="form-control tamanhoInput" id="nomeVistoriador" name="nomeVistoriador" placeholder="Nome Vistoriador">
                                </div>

                                <div class="form-group col-md-6 mt-2">
                                    <input type="text" class="form-control tamanhoInput cpf" id="cpfVistoriador" name="cpfVistoriador" placeholder="CPF">
                                </div>
                                <div class="text-center col-md-12 mt-3 destaque mb-3"><h4>CHECKLIST</h4></div>
                                <!--internet -->
                                <div class="col-md-2 mt-2">
                                    <p>Tem internet?</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control tamanhoInput" id="">
                                            <option>Sim</option>
                                            <option>Não</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control tamanhoInput " id="observacao" name="observacao" placeholder="Observações">
                                </div>
<!--internet -->
                <!--internet -->
                                <div class="col-md-2 mt-2">
                                    <p>Tem internet?</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control tamanhoInput" id="">
                                            <option>Sim</option>
                                            <option>Não</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control tamanhoInput " id="observacao" name="observacao" placeholder="Observações">
                                </div>
<!--internet -->
                <!--internet -->
                                <div class="col-md-2 mt-2">
                                    <p>Tem internet?</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control tamanhoInput" id="">
                                            <option>Sim</option>
                                            <option>Não</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control tamanhoInput " id="observacao" name="observacao" placeholder="Observações">
                                </div>
<!--internet -->
                <!--internet -->
                                <div class="col-md-2 mt-2">
                                    <p>Tem internet?</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control tamanhoInput" id="">
                                            <option>Sim</option>
                                            <option>Não</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control tamanhoInput " id="observacao" name="observacao" placeholder="Observações">
                                </div>
<!--internet -->
                <!--internet -->
                                <div class="col-md-2 mt-2">
                                    <p>Tem internet?</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control tamanhoInput" id="">
                                            <option>Sim</option>
                                            <option>Não</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control tamanhoInput " id="observacao" name="observacao" placeholder="Observações">
                                </div>
<!--internet -->
                <!--internet -->
                                <div class="col-md-2 mt-2">
                                    <p>Tem internet?</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control tamanhoInput" id="">
                                            <option>Sim</option>
                                            <option>Não</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control tamanhoInput " id="observacao" name="observacao" placeholder="Observações">
                                </div>
<!--internet -->
                <!--internet -->
                                <div class="col-md-2 mt-2">
                                    <p>Tem internet?</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control tamanhoInput" id="">
                                            <option>Sim</option>
                                            <option>Não</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control tamanhoInput " id="observacao" name="observacao" placeholder="Observações">
                                </div>
<!--internet -->
                <!--internet -->
                                <div class="col-md-2 mt-2">
                                    <p>Tem internet?</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control tamanhoInput" id="">
                                            <option>Sim</option>
                                            <option>Não</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control tamanhoInput " id="observacao" name="observacao" placeholder="Observações">
                                </div>
<!--internet -->
                <!--internet -->
                                <div class="col-md-2 mt-2">
                                    <p>Tem internet?</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control tamanhoInput" id="">
                                            <option>Sim</option>
                                            <option>Não</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control tamanhoInput " id="observacao" name="observacao" placeholder="Observações">
                                </div>
<!--internet -->
                <!--internet -->
                                <div class="col-md-2 mt-2">
                                    <p>Tem internet?</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control tamanhoInput" id="">
                                            <option>Sim</option>
                                            <option>Não</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control tamanhoInput " id="observacao" name="observacao" placeholder="Observações">
                                </div>
<!--internet -->
                <!--internet -->
                                <div class="col-md-2 mt-2">
                                    <p>Tem internet?</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control tamanhoInput" id="">
                                            <option>Sim</option>
                                            <option>Não</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control tamanhoInput " id="observacao" name="observacao" placeholder="Observações">
                                </div>
<!--internet -->
                <!--internet -->
                                <div class="col-md-2 mt-2">
                                    <p>Tem internet?</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control tamanhoInput" id="">
                                            <option>Sim</option>
                                            <option>Não</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="form-control tamanhoInput " id="observacao" name="observacao" placeholder="Observações">
                                </div>
<!--internet -->
<div class="form-group mt-2 mb-3 col-md-12">
                    <input type="submit" class="btn btn-success form-control" value="Finalizar Check List">
                </div>
                            </div>
                        </form>

                        <!--fim conteudo da tela aqui!-->
                    </div>
                </main>
                <?php include_once "../ferramentas/rodape.php"; ?>
            </div>
        </div>
        <script src="../js/cp_mascaras.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>