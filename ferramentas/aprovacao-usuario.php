<?php
include_once '../config/conexao.php';

if(isset($_GET['aprovaUserCod'])){
    $cod_usuario = $_GET['aprovaUserCod'];
    $sql_aprovacao = mysqli_query($conexao, "UPDATE morador SET m_status = 1 WHERE m_cod = '$cod_usuario'");

    $sql_email = mysqli_query($conexao, "SELECT m_nome, m_email FROM morador WHERE m_cod = '$cod_usuario'");
    $resultado_email = mysqli_fetch_assoc($sql_email);
    $nome = $resultado_email['m_nome'];
    $email = $resultado_email['m_email'];
    header("location: ../sistema/aprova-usuarios.php?aprovacao=1");
    
    include "PHPMailer/PHPMailerAutoload.php"; 
    $mail = new PHPMailer(); 
    $mail->IsSMTP(); 
    $mail->Host = "ns954.hostgator.com.br"; 
    $mail->Port = 587; 
    $mail->SMTPAuth = true; 
    $mail->Username = 'naoresponda@quallyplan.com.br'; 
    $mail->Password = 'bemk@2021'; 
    $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
    $mail->SMTPDebug = 2;
    $mail->From = "naoresponda@quallyplan.com.br";
    $mail->FromName = "Informe Quallyplan";
    $mail->AddAddress($email, $nome); 
    $mail->IsHTML(true); 
    $mail->CharSet = 'UTF-8'; 
    $mail->Subject = 'Aprovação de Cadastro'; 
    $mail->Body = "<table cellspacing='0' cellpadding='0'>
    <thead style='background-color:#9fc5e8; '>
        <tr>
            <th width='30%;' align='center' style='padding:10px;'><img class='adapt-img' src='https://quallyplan.com.br/wp-content/uploads/2021/04/LOGOQUALLYPLAN.png' alt style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic' width='100'></th>
            <th align='center' style='vertical-align:inherit;color:#EB0FA5;font-size:20px; padding:10px;'>Aprovação de cadastro!</th>
        </tr>
    </thead>
    <tbody style='background-color:#fafafa; '>
        <tr>
            <td align='center' colspan='2'>
                <br>
                <p align='left' style='padding-left: 10px; font-size: 18px;'>
                    Olá <span style='font-weight:600; color: #EB0FA5;'>$nome</span>, tudo bem?<br><br>
                    O Seu cadastro na Quallyplan foi aprovado!<br><br>
                    <span style='font-weight:600;'>Acesse:</span><br>
                    <a href='https://meucondominio.quallyplan.com.br' style='font-weight:600; color: #EB0FA5;'>meucondominio.quallyplan.com.br</a><br><br>
                    Insira suas credencias de Acesso:<br><br>
                    <span style='font-weight:600;'>E-mail:</span> <span style='font-weight:600; color: #EB0FA5;'>$email</span><br>
                    <span style='font-weight:600;'>Senha:</span> <span style='font-weight:600; color: #EB0FA5;'>********</span><br><br>
                    E preencha o restante das informações obrigatórias para ter acesso completo ao nosso sistema.<br><br>
                </p>
            </td>
        </tr>
    </tbody>
    <tfoot style='background-color:#9fc5e8; '>
        <tr>
            <td colspan='2' align='center'>
                <p style='font-size: 18px;'>Se tiver qualquer dúvida, teremos o maior prazer em atendê-los.</p>
                <a href='tel:2120181767' style='color:#ffffff; background:#EB0FA5; border: 1px solid #EB0FA5; padding: 10px; border-radius: 10px; text-decoration: none;'>Whatsapp</a>
                <a href='tel:2120181767' style='color:#ffffff; background:#EB0FA5; border: 1px solid #EB0FA5; padding: 10px; border-radius: 10px; text-decoration: none;'>Ligar</a>
                                <a href='https://quallyplan.com.br' style='color:#ffffff; background:#EB0FA5; border: 1px solid #EB0FA5; padding: 10px; border-radius: 10px; text-decoration: none;'>Acessar o site</a>
                                <br><br> 
            </td>
        </tr>
    </tfoot>
</table>"; 
    $enviado = $mail->Send(); 
}