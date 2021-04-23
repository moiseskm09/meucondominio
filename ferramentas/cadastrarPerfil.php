<?php 

include_once '../config/conexao.php';

$nome_perfil_novo=$_POST['nome_perfil_novo'];
            
$insere_perfil= mysqli_query($conexao, "INSERT INTO perfis_usuarios (p_perfil) VALUES ('$nome_perfil_novo')");
            
$consulta_perfil_criado = mysqli_query($conexao, "SELECT p_cod FROM perfis_usuarios ORDER BY p_cod DESC LIMIT 1");
            
$resultado_criacao_perfil = mysqli_fetch_assoc($consulta_perfil_criado);
            
$id_perfil_criado = $resultado_criacao_perfil['p_cod'];
            
            
$insere_permissao_perfil_criado = mysqli_query($conexao, "INSERT INTO nivel_acesso (cod_perfil, codMenu, codSubmenu, marcado) VALUES
INSERT INTO `nivel_acesso` (`cod_perfil`, `codMenu`, `codSubmenu`, `marcado`) VALUES
($id_perfil_criado, 1, 1, 1),
($id_perfil_criado, 1, 2, 1),
($id_perfil_criado, 2, 3, 1),
($id_perfil_criado, 8, 4, 1),
($id_perfil_criado, 1, 5, 1),
($id_perfil_criado, 1, 6, 1),
($id_perfil_criado, 1, 7, 1),
($id_perfil_criado, 2, 8, 1),
($id_perfil_criado, 2, 9, 1),
($id_perfil_criado, 2, 10, 1),
($id_perfil_criado, 3, 11, 1),
($id_perfil_criado, 7, 12, 1),
($id_perfil_criado, 7, 13, 1),
($id_perfil_criado, 3, 14, 1),
($id_perfil_criado, 3, 15, 1),
($id_perfil_criado, 3, 16, 1);");     

        

 header("location: ../sistema/perfis-usuarios.php?id=".$id_perfil_criado);
         
