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
        <script type="text/javascript" src="../js/webcamjs/webcam.min.js"></script>
        <script language="JavaScript">

 function bater_foto()
 {
 Webcam.snap(function(data_uri)
 {
 document.getElementById('results').innerHTML = '<img id="base64image" src="'+data_uri+'"/><button onclick="salvar_foto();">Upload desta Foto</button>';
 });
 }

 function mostrar_camera()
 {
 Webcam.set({
 width: 640,
 height: 480,
 dest_width: 640,
 dest_height: 480,
 crop_width: 300,
 crop_height: 400,
 image_format: 'jpeg',
 jpeg_quality: 100,
 flip_horiz: true
 });
 Webcam.attach('#minha_camera');
 }

 function salvar_foto()
 {
 document.getElementById("carregando").innerHTML="Salvando, aguarde...";
 var file = document.getElementById("base64image").src;
 var formdata = new FormData();
 formdata.append("base64image", file);
 var ajax = new XMLHttpRequest();
 ajax.addEventListener("load", function(event) { upload_completo(event);}, false);
 ajax.open("POST", "upload.php");
 ajax.send(formdata);
 }

 function upload_completo(event)
 {
 document.getElementById("carregando").innerHTML="";
 var image_return=event.target.responseText;
 var showup=document.getElementById("completado").src=image_return;
 var showup2=document.getElementById("carregando").innerHTML='<b>Upload feito:</b>';
 }
 window.onload= mostrar_camera;
 </script>
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
.container
 {
 float: left;
 width:320px;
 height: 480px;
 margin-right: 5px;
 padding: 5px;
 }
 #camera
 {
 background: #ff6666;
 height: 480px;
 }
 #previa
 {
 background: #ffc865;
 height: 480px;
 }
 #salva
 {
 background: #4dea02;
 height: 480px;
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
                         <div class="container" id="camera"><b>Câmera:</b>
 <div id="minha_camera"></div><form><input type="button" value="Tirar Foto" onClick="bater_foto()"></form>
 </div>
 <div class="container" id="previa">
 <b>Prévia:</b><div id="results"></div>
 </div>
 <div class="container" id="salva">
 <span id="carregando"></span><img id="completado" src=""/>
 </div>
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