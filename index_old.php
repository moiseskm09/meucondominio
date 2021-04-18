<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Meta tags Obrigatórias -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery3.2.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="img/Logo_quallyplan.svg" type="image/x-icon">
	<link rel="icon" href="img/Logo_quallyplan.svg" type="image/x-icon">
        <title>Meu Condomínio - Autenticação</title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            html, body {
                height: 100%;
            }

            body {
                 display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                padding-top: 40px;
                padding-bottom: 40px;
                background-image: url("img/5026563.jpg");
                background-repeat: no-repeat;
                background-size: cover;
            }

            #caixa-login { 
                width: 100%;
                max-width: 500px;
                padding: 15px;
                margin: auto;    
            }

            .tamanho{ height: 45px; border-radius: 10px; font-size: 16px;}
            .header-modal {
                background-image: linear-gradient(270deg,#224D62 17%,#29293A 100%);
                color: #ffffff;
            }
            .botoes {
                background-color: #ffffff;
                border: 1px solid #FFD70F;
                color: #224D62;
                font-weight: 500;
                font-size: 16px;
            }

            .botoes:hover{
                background-color: #224D62;
                box-shadow: 0px 0px 5px #FFD70F;
                color: #ffffff;
                font-weight: 500;
                font-size: 16px;
            }
        </style>
    </head>
    <body class="text-center">

        <div class="container-fluid"> 
            <div class="row">
                <div id="caixa-login">
                    <?php
                    ini_set('display_errors', 0);
                    error_reporting(0);
                    $sucesso = (int) $_GET["sucesso"];
                    if ($sucesso === 1) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></a>
                                  <p class="mb-0"><strong>Uhuuu!</strong> O Cadastro foi realizado com sucesso. Agora é só aguardar a aprovação! Em breve você receberá um e-mail com mais informações!</p>
                                  </div>';
                    }
                    $erro = (int) $_GET["erro"];
                                        if ($erro === 1) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></a>
                                  <p class="mb-0"><strong>Hummm!</strong> Seu<strong> Usuário ou Senha</strong> estão inválidos!<br>Por favor, tente novamente!</p>
                                  </div>';
                                        }else if ($erro === 2) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></a>
                                  <p class="mb-0"><strong>Hummm!</strong> Não foi possível cadastrar, este <strong>CPF</strong> já existe em nosso sistema! Suas informações estão corretas?</p>
                                  </div>';
                    } else if ($erro === 3) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></a>
                                  <p class="mb-0"><strong>Hummm!</strong> Não foi possível cadastrar, este <strong>E-MAIL</strong> já existe em nosso sistema! Suas informações estão corretas?</p>
                                  </div>';
                    } else if ($erro === 4) {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                  <a href="#" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times"></i></a>
                                  <p class="mb-0"><strong>Hummm!</strong> Seu cadastro ainda está pendente de aprovação. Assim que estiver aprovado, você recebrá um e-mail com instruções de acesso. Fique ligado!</p>
                                  </div>';
                    }
                    ?>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="caixa-login" class="">
                        <div class="text-center logo mb-1">
                            <img src="img/Logo_quallyplan.svg" height="200">
                        </div>

                        <div class="apresentacao text-center text-dark">
                            <h4>Bem-vindo</h4>
                            <h6>Infome os dados de acesso</h6>
                        </div>
                        <div class="formulario text-center">
                            <form action="ferramentas/login.php" method="POST">
                                <div class="input-group mb-3">
                                    <input type="text" name="email" class="form-control tamanho" placeholder="E-mail" aria-label="Usuário" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="senha" class="form-control tamanho" placeholder="Senha" aria-label="Senha" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <input type="submit" class="form-control tamanho btn btn-info" value="Entrar">
                                </div>
                            </form>

                            <div class="apresentacao text-center text-dark">
                                <p><a href="#esquecisenha" data-toggle="modal" data-target="#esquecisenha" class="text-dark">Esqueceu a senha?</a></p>
                                <p>Ainda não tem cadastro? <a href="#cadastromorador" data-toggle="modal" data-target="#cadastromorador" class="text-dark">Clique aqui!</a></p>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal cadastro-->
        <div class="modal" id="cadastromorador" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header border-0 bg-info text-center">
                        <h5 class="modal-title text-white">Solicitação de Cadastro</h5>
                        <a href="" data-dismiss="modal" aria-label="Fechar"><i class="fas fa-times"></i></a>
                        </button>
                    </div>
                    <form action="ferramentas/cadastro-morador.php" method="POST">
                        <div class="modal-body">
                            <div class="input-group mb-2">
                                <input type="text" name="nome" class="form-control tamanhoInput nome" aria-describedby="basic-addon1" placeholder="Nome" required>
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" name="sobrenome" class="form-control tamanhoInput sobrenome" aria-describedby="basic-addon1" placeholder="Sobrenome" required>
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" name="cpf" class="form-control tamanhoInput cpf" aria-describedby="basic-addon1" placeholder="CPF" required>
                            </div>
                            <div class="input-group mb-2">
                                <input type="email" name="email" class="form-control tamanhoInput email" aria-describedby="basic-addon1" placeholder="E-mail" required>
                            </div>
                            <div class="input-group mb-2">
                                <input type="tel" name="telefone" class="form-control tamanhoInput phone_with_ddd" aria-describedby="basic-addon1" placeholder="Telefone" required>
                            </div>
                            <div class="input-group mb-2">
                                <select class="custom-select" id="tipoDeMoradia" name="tipoDeMoradia" required>
                                    <option selected value="vazio">Qual o tipo de imóvel?</option>
                                    <option value="comercial">Comercial</option>
                                    <option value="condominio">Condomínio</option>
                                    <option value="residencial">Residencial</option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" name="nomeImovel" class="form-control tamanhoInput nomeImovel" aria-describedby="basic-addon1" placeholder="Nome do imóvel">
                            </div>
                            <div class="input-group mb-2">
                                <input type="password" name="senha" class="form-control tamanhoInput senha" aria-describedby="basic-addon1" placeholder="Crie uma senha de acesso" minlength="8" maxlength="16">

                            </div>
                            <div class="form-helper text-left">A senha deve ter entre 8 e 16 caracteres!</div>    

                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-sm btn-info">Confirmar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal cadastro fim -->
        <!-- Modal esquci senha-->
        <div class="modal" id="esquecisenha" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-light">
                    <div class="modal-header border-0 bg-info text-center">
                        <h5 class="modal-title text-white">Esqueci minha senha</h5>
                        <a href="" data-dismiss="modal" aria-label="Fechar"><i class="fas fa-times"></i></a>
                        </button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <p>Por favor, informe abaixo o e-mail cadastrado no sistema, para que possamos enviar uma nova senha de acesso!</p>
                            <div class="input-group mb-2">
                                <input type="email" name="email_senha" class="form-control tamanhoInput email" aria-describedby="basic-addon1" placeholder="E-mail" required>
                            </div>


                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn btn-sm btn-info">Confirmar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal esqueci senha fim -->                            
        <script>
            $(document).ready(function () {
                $('.numero').mask('000');
                $('.date').mask('00/00/0000');
                $('.time').mask('00:00:00');
                $('.date_time').mask('00/00/0000 00:00:00');
                $('.cep').mask('00000-000');
                $('.phone').mask('0000-0000');
                $('.phone_with_ddd').mask('(00) 0 0000-0000');
                $('.phone_us').mask('(000) 000-0000');
                $('.mixed').mask('AAA 000-S0S');
                $('.cpf').mask('000.000.000-00', {reverse: true});
                $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
                $('.taxa').mask('000.000.000.000.000,00', {reverse: true});
                $('.money2').mask("#.##0,00", {reverse: true});
                $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                    translation: {
                        'Z': {
                            pattern: /[0-9]/, optional: true
                        }
                    }
                });
                $('.ip_address').mask('099.099.099.099');
                $('.percent').mask('##0,00%', {reverse: true});
                $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
                $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
                $('.fallback').mask("00r00r0000", {
                    translation: {
                        'r': {
                            pattern: /[\/]/,
                            fallback: '/'
                        },
                        placeholder: "__/__/____"
                    }
                });
                $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
            });
        </script>

        <script src="js/bootstrap.min.js"></script>
    </body>
</html>