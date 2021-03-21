<?php
require_once '../ferramentas/sessao.php';
require_once '../ferramentas/conexao.php';
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
    <body class="sb-nav-fixed">
        <?php include_once "../ferramentas/navbar.php"; ?>
        <div id="layoutSidenav">
            <?php include_once "../ferramentas/menu.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <!--conteudo da tela aqui!-->
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h2 class="titulo">Usuários aguardando aprovação</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="mr-2">
                                    <button class="botoes" href="#adicionar" data-toggle="modal" data-target="#adicionar">Adicionar</button>
                                    <button class="botoes">Filtrar</button>
                                    <button class="botoes">Exportar</button>

                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-borderless table-sm">
                                <thead class="border bg-info text-white">
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>E-mail</th>
                                        <th>Telefone</th>
                                        <th>Data de cadastro</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="border">
                                    <?php
                                    $sql_buscaMoradorAprovacao = mysqli_query($conexao, "SELECT * FROM morador WHERE m_status = '2'");
                                    if (mysqli_num_rows($sql_buscaMoradorAprovacao) > 0) {
                                        while ($resultado_buscaMoradorAprovacao = mysqli_fetch_assoc($sql_buscaMoradorAprovacao)) {
                                            ?>
                                            <tr class="linha-hover">
                                                <td><?php echo $resultado_buscaMoradorAprovacao['m_cod']; ?></td>
                                                <td><?php echo $resultado_buscaMoradorAprovacao['m_nome']; ?></td>
                                                <td><?php echo $resultado_buscaMoradorAprovacao['m_cpf'];?></td>
                                                <td><?php echo $resultado_buscaMoradorAprovacao['m_email'];?></td>
                                                <td><?php echo $resultado_buscaMoradorAprovacao['m_telefone'];?></td>
                                                <td><?php echo $resultado_buscaMoradorAprovacao['m_datacadastro'];?></td>
                                                <td>
                                                    <a href="" data-toggle="modal" data-target="" class="mr-3"><i class="fas fa-eye text-primary"></i></a>
                                                    <a href="" data-toggle="modal" data-target="" class="mr-3"><i class="fas fa-pencil-alt icone-editar"></i></a>
                                                 
                                                    <a href="" data-toggle="modal" data-target=""><i class="fas fa-times icone-desativar"></i></a>

                                                </td> 
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr class="linha-hover">
                                            <td colspan="4" class="text-center">Não há itens para exibir</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal adicionar-->
                        <div class="modal" id="adicionar" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content bg-light">
                                    <div class="modal-header border-0 header-modal">
                                        <h5 class="modal-title">Adicionar serviço</h5>
                                        <a href="" data-dismiss="modal" aria-label="Fechar"><i class="fas fa-times icone-desativar"></i></a>
                                        </button>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" name="cod_servico_editado" class="form-control tamanhoInput" aria-describedby="basic-addon1" value="<?php echo $resulta_buscaServico['cod_servico']; ?>">
                                            <div class="input-group mb-3">
                                                <input type="text" id="servico" name="servico" class="form-control tamanhoInput" aria-describedby="basic-addon1" placeholder="Nome do serviço" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="valorHora" name="valorHora" class="form-control tamanhoInput money2" aria-describedby="basic-addon1" placeholder="Valor por hora" required>
                                            </div>  
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit" class="botoes">Adicionar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal adicionar fim -->
                        <!--fim conteudo da tela aqui!-->
                </main>
                <?php include_once "../ferramentas/rodape.php"; ?>
            </div>
        </div>
        <script src="../js/cp_mascaras.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>