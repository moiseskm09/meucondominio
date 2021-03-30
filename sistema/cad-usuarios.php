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
                            <h2 class="titulo">Usuários</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="mr-2">
                                    <button class="btn btn-sm btn-success">Adicionar</button>
                                    <button class="btn btn-sm btn-primary">Filtrar</button>
                                    <button class="btn btn-sm btn-dark">Exportar</button>

                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-borderless table-sm">
                                <thead class="border bg-info text-white">
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome Completo</th>
                                        <th>E-mail</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="border">
                                    <?php
                                    $sqlUsuarios = mysqli_query($conexao, "SELECT * FROM usuarios");
                                    if (mysqli_num_rows($sqlUsuarios) > 0) {
                                        while ($resultadoUsuarios = mysqli_fetch_assoc($sqlUsuarios)) {
                                            ?>
                                            <tr class="linha-hover">
                                                <td><?php echo $resultadoUsuarios['id_usuario']; ?></td>
                                                <td><?php echo ucwords(strtolower($resultadoUsuarios['nome']." ".$resultadoUsuarios['sobrenome']));?></td>
                                                <td><?php echo $resultadoUsuarios['email'];?></td>
                                                <td class="text-center">
                                                    <a href="#user_aprovacao<?php echo $resultado_buscaMoradorAprovacao['m_cod']; ?>" data-toggle="modal" data-target="#user_aprovacao<?php echo $resultado_buscaMoradorAprovacao['m_cod']; ?>" class="mr-3"><i class="fas fa-eye text-primary"></i></a>
                                                    <!-- Modal visualizar-->
                        <div class="modal text-left" id="user_aprovacao<?php echo $resultado_buscaMoradorAprovacao['m_cod']; ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content bg-light">
                                    <div class="modal-header border-0 bg-info">
                                        <h5 class="text-white">Visualização Completa</h5>
                                        <a href="" data-dismiss="modal" aria-label="Fechar"><i class="fas fa-times icone-desativar"></i></a>
                                        </button>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" name="cod_UserAprovacao" class="form-control tamanhoInput" aria-describedby="basic-addon1" value="<?php echo $resultadoUsuarios['id_usuario']; ?>">
                                            <label for="nomeUserAprovacao">Nome Completo</label>
                                            <div class="input-group mb-3">
                                                <input type="text" id="servico" name="nomeUserAprovacao" class="form-control tamanhoInput" aria-describedby="basic-addon1" value="<?php echo ucwords(strtolower($resultadoUsuarios['nome']." ".$resultadoUsuarios['sobrenome']));?>" required readonly>
                                            </div>
                                            <label for="emailUserAprovacao">E-mail</label>
                                            <div class="input-group mb-3">
                                                <input type="text" id="servico" name="emailUserAprovacao" class="form-control tamanhoInput" aria-describedby="basic-addon1" value="<?php echo $resultadoUsuarios['email'];?>" required readonly>
                                            </div>                                           
                                        </div>
                                        <div class="modal-footer border-0">
                                            <a href="" data-dismiss="modal" aria-label="Fechar" class="btn btn-sm btn-danger" >Fechar</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal visualizar fim -->
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