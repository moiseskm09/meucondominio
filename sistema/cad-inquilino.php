<?php
require_once '../config/sessao.php';
require_once '../config/conexao.php';
require_once '../config/config_geral.php';


if (isset($_POST['nome'], $_POST['cpf'], $_POST['email'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $sql_code = mysqli_query($conexao, "SELECT * FROM morador WHERE m_nome LIKE '%$nome%' and LIKE '%$cpf%' and LIKE '%$email%'");
    $numeroLinhas = mysqli_num_rows($sql_code);
} else{

    //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 

    //pegar todos os registros do banco de dados
    $sql = mysqli_query($conexao, "SELECT m_cod FROM morador");
    $numeroTotalLinhas = mysqli_num_rows($sql);

    //define o numero de itens por pagina
    $itens_por_pagina =12;

    //divide o total de linhas pelo numero maximo de registro e retorna um numero inteiro
    $numero_paginas = ceil($numeroTotalLinhas / $itens_por_pagina);
    
    $inicio = ($itens_por_pagina * $pagina) - $itens_por_pagina;

    $sql_buscaMoradorAprovacao = mysqli_query($conexao, "SELECT m_cod, m_nome, m_sobrenome, m_cpf, m_rg, m_datanascimento, m_email, m_telefone FROM morador ORDER BY m_nome LIMIT $inicio, $itens_por_pagina ");
    $numeroLinhas = mysqli_num_rows($sql_buscaMoradorAprovacao);
} 
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
    <body>
        <?php include_once "../ferramentas/navbar.php"; ?>
                <main>
                    <div class="container-fluid">
                        <!--conteudo da tela aqui!-->
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h2 class="titulo">Inquilinos</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="mr-2">
                                    <button class="btn btn-sm btn-success">Adicionar</button>
                                    <button class="btn btn-sm btn-primary">Filtrar</button>
                                    <button class="btn btn-sm btn-dark">Exportar</button>

                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-borderless table-sm" style= "white-space: nowrap;">
                                <thead class="border thead-tabela">
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
                                    if ($numeroLinhas > 0) {
                                        while ($resultado_buscaMoradorAprovacao = mysqli_fetch_assoc($sql_buscaMoradorAprovacao)) {
                                            ?>
                                            <tr class="linha-hover">
                                                <td><?php echo $resultado_buscaMoradorAprovacao['m_cod']; ?></td>
                                                <td><?php echo ucwords(strtolower($resultado_buscaMoradorAprovacao['m_nome']));?></td>
                                                <td><?php echo $resultado_buscaMoradorAprovacao['m_cpf'];?></td>
                                                <td><?php echo $resultado_buscaMoradorAprovacao['m_email'];?></td>
                                                <td><?php echo $resultado_buscaMoradorAprovacao['m_telefone'];?></td>
                                                <td><?php echo date("d/m/Y", strtotime($resultado_buscaMoradorAprovacao['m_datacadastro']));?></td>
                                                <td class="text-center">
                                                    <a href="visualiza-inquilino.php?id=<?php echo $resultado_buscaMoradorAprovacao['m_cod']; ?>" class="mr-3"><i class="fas fa-eye text-primary"></i></a>
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
                                <tfoot>
                                    <tr>
                                        <td colspan="3"><?php echo "Mostrando ".$numeroLinhas; ?> de <?php echo $numeroTotalLinhas; ?> registros</td>
                                        <td colspan="4">
                                            <nav>
                                    <ul class="pagination pagination-sm justify-content-end">
                                        <li class="page-item ">
                                            <a class="page-link" href="?pagina=1" tabindex="-1"><span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Primeira</span></a>
                                        </li>
<?php
for ($i = 1; $i < $numero_paginas + 1; $i++) {
    $estilo = "";
    if ($pagina == $i) {
        $estilo = 'active';
    }
    ?>
                                            <li class="page-item <?php echo $estilo; ?>"><a class="page-link" href="?pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
                                        <?php }
                                        ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?pagina=<?php echo $numero_paginas?>"><span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Última</span></a>
                                        </li>
                                    </ul>
                                </nav>
                                        </td>
                                    </tr>
                                </tfoot>
                                
                            </table>
                        </div>
                   
                        <!--fim conteudo da tela aqui!-->
                </main>
        <script src="../js/cp_mascaras.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>