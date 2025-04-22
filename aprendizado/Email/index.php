<?php
require_once("vendor/autoload.php");
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = ' ';
$mail->Password = ' ';

$mail->setFrom(' ', ' ');
$mail->addAddress(' ', ' ');
$mail->Subject = 'Testes - 1';
$mail->msgHTML(file_get_contents('email.html'), dirname(__FILE__));
$mail->AltBody = 'deu errado o html';

if(!$mail->send())
{
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else
{
    echo 'Sua mensagem foi enviada com sucesso!';
}