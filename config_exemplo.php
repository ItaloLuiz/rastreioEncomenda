<?php 
/*
Renomeie esse arquivo para config.php
*/

$url_sistema = 'http://localhost/rastreioEncomenda';
$url_rastreio = $url_sistema."/resultado.php?obj=$obj";

require_once("email/PHPMailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "";
$mail->Port = 2525;
$mail->Username = "";
$mail->Password = "";
$mail->CharSet = 'UTF-8';