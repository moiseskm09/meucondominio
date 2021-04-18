<?php
require_once '../config/sessao.php';
require_once '../config/conexao.php';
require_once '../config/config_geral.php';

$clicado_perfil = $_GET['id'];
$consulta_perfil_clicado = mysqli_query($conexao, "SELECT * from perfis_usuarios WHERE p_cod = '$clicado_perfil'"); 
$resultado_perfil_clicado = mysqli_fetch_assoc($consulta_perfil_clicado);   
$perfil_option = $resultado_perfil_clicado['p_perfil'];

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
                background-color: #ffffff;
                color:#023246;
            }

            .tamanhoInput:focus {
                background-color: #ffffff;
                box-shadow: 0px 0px 5px #EB0FA5;
                border: none;
                font-weight: 600;
                color: #023246;

            }
            body {
                background-color: #e8e8e8;
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
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h2 class="titulo">Perfis de acesso</h2>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <div class="mr-2">
                                    <a href="#criarPerfil" data-toggle="modal" data-target="#criarPerfil" class="btn btn-sm btn-success">Adicionar</a>
                                </div>
                            </div>
                           
                        </div>
                        <div class="form-row">
                            
                         <div class="form-group col-md-12">
                             <form action="../ferramentas/pesquisa_perfil.php" method="POST" id="perfil">
                                <div class="form-group">
                                    
                                    <select id="nome_perfil" name="nome_perfil" onchange="this.form.submit()" class="form-control  tamanhoInput" required>
                                       
                                        <option value=""><?php if (isset($perfil_option)) { echo $perfil_option; } else {echo "Selecione ...";}?></option>
                                        <?php $consulta_perfil=mysqli_query($conexao, "SELECT * FROM perfis_usuarios");
                                        if (mysqli_num_rows($consulta_perfil) > 0) {
                                        while ($perfis= mysqli_fetch_assoc($consulta_perfil)){?>
                                        <option value="<?php echo $perfis["p_cod"];?>"><?php echo $perfis["p_perfil"];?></option>   
                                        <?php } }else{}?>
                                    </select>
                                    
                                </div>  
                                
                            </form>

                    </div>

                        </div>
                        <div class="form-row">
                        <div class="col-md-12">
                            <div class="text-center bg-white destaque font-weight-bold p-1 arredondamento">
                                    <h5>Permissões do Perfil<h5>
                                </div>
                        </div>
                            <div class="col-md-12">
                                    <?php if ($clicado_perfil == null){
                                    echo '<div class="alert-warning mt-2 p-3 arredondamento">';
                                    echo '<p class="alert font-weight-bold">Selecione um perfil para visualizar as permissões!</p>';
                                   
                                    }else { ?>

                            <ul class="list-unstyled bg-white arredondamento">
          <?php 
          $seleciona_menu_permissao = mysqli_query($conexao, "SELECT * FROM menu");
          while ($resultado_permissao = mysqli_fetch_assoc($seleciona_menu_permissao)) {
              $idMenuPermissao = $resultado_permissao["id"];
              ?>
          
          <li>
              <div class="p-2 destaque mb-2 mt-2">
                  <strong class="">
                      <?php echo $resultado_permissao['menu'];?>
                  </strong>
              </div>                    

        <?php 
                $seleciona_submenu_permissao = mysqli_query($conexao, "SELECT submenu, marcado, cod_submenu FROM submenu
                                                            INNER JOIN nivel_acesso ON codSubmenu = cod_submenu and cod_perfil = '$clicado_perfil' WHERE codMenu = '$idMenuPermissao'");
              if (mysqli_num_rows($seleciona_submenu_permissao) == 0 ){
                  echo "oi";
              }else {
        ?>
              <ul class="list-unstyled list-unstyled bg-white" id="">
                  <form action="../ferramentas/atualiza_permissao_usuario.php" method="POST">
                      
                  <div class="form-row">
                  <?php
                  while ($resultado_submenu_permissao = mysqli_fetch_assoc($seleciona_submenu_permissao)){
                 
                      if($resultado_submenu_permissao['marcado'] == 1){
                          
                       ?>
                  <li>
                                   <div class="col-md-12">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" name="permissao_menu[]" value="<?php echo $resultado_submenu_permissao['cod_submenu'];?>" id="<?php echo $resultado_submenu_permissao['cod_submenu'];?>" checked>
                                        <label class="form-check-label" for="<?php echo $resultado_submenu_permissao['cod_submenu'];?>">
                                        <?php echo $resultado_submenu_permissao['submenu'];?>
                                        </label>
                                        </div>
                                      </div>
                  </li>
                  
              <?php  
                      } else {
                          ?>
                                    <li>
                                   <div class="col-md-12">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" name="permissao_menu[]" value="<?php echo $resultado_submenu_permissao['cod_submenu'];?>" id="<?php echo $resultado_submenu_permissao['cod_submenu'];?>">
                                        <label class="form-check-label" for="<?php echo $resultado_submenu_permissao['cod_submenu'];?>">
                                        <?php echo $resultado_submenu_permissao['submenu'];?>
                                        </label>
                                        </div>
                                      </div>
                  </li>
                  <?php
                      }
                      }   ?>
                  </div>
              </ul>
              <?php  }   ?>
          </li>
        <?php  }
        ?>
                    <div class="text-right col-md-12">
              <li>
                  
                  <button class="btn btn-small btn-success loading" type="submit">Salvar</button>
              </li>
              
          </div>
          <input type="hidden" id="id" name="id" value="<?php echo $clicado_perfil; ?>">
                            </form>
      </ul>       
                                    <?php }?>             
                                    
                        </div>
                                                                                          <?php
                    $sucesso = (int) $_GET["sucesso"];
                    if ($sucesso === 1) {
                        echo '<br>';
                        echo '<div class="alert alert-success text-center alert-dismissible fade show font-weight-bold arredondamento" role="alert">
                              Perfil atualizado com sucesso!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                              </div>';
                        
                        
                        
                    }
                    ?>
                        </div>
                <!-- Modal -->
<div class="modal fade" id="criarPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Criação de perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="../ferramentas/cadastrarPerfil.php" method="POST">
               <label for="nome_perfil_novo">Nome do Perfil</label>
               <input type="text" class="form-control tamanhoInput" name="nome_perfil_novo" placeholder="Insira o nome do perfil" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success loading">Criar</button>
        
        </form>
      </div>
    </div>
  </div>
</div>
                <?php include_once "../ferramentas/modal_loading.php"; ?> 
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