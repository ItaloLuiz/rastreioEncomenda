<?php

if (!isset($_REQUEST['obj']) || (empty($_REQUEST['obj']))) {
    echo 'Favor informar o código de rastreio!';
    exit();
}

$obj = $_REQUEST['obj'];
$objetos    = array("$obj");

require_once __DIR__ . '/vendor/autoload.php';
include 'funcoes.php';
$resultados = gerarHtmldoRastreio($objetos);
include 'config.php';
include 'blocosMensagens/blocoParaGerarMensagemEmail.php';
include 'blocosMensagens\blocoParaGerarPdf.php';

//gerar o PDF
$mpdf = new \Mpdf\Mpdf();
ob_start();
$mpdf->WriteHTML($blocoPDF);
$html = ob_get_contents();
ob_end_clean();
$mpdf->Output("upload/$obj.pdf", \Mpdf\Output\Destination::FILE);

//quem vai receber o email
$para    = 'joao.macedo@elastic.fit';
$assunto = 'Teste - Dev. Sistema de Informação';


if (!file_exists('upload/' . "$obj.pdf")) {
    echo 'Atenção, o PDF não foi gerado';
    exit();
}

$pegarPDF = 'upload/' . "$obj.pdf";
$mail->SetFrom("italo.luis.s@gmail.com", 'Italo Luiz');
$mail->Subject = $assunto;
$msg = $msgBoxEmail;
$mail->AltBody = strip_tags($msg);
$mail->MsgHTML($msg);
$mail->AddAddress($para);
if (file_exists('upload/' . "$obj.pdf")) {
    $mail->AddAttachment($pegarPDF);
}
if (!$mail->Send()) {
    echo 'Erro ao enviar o email';
} else {
    //apago o PDF na pasta
    unlink($pegarPDF);
    echo "<div style=\"text-align:center;padding:10px;\">
    Email enviado com sucesso para: <strong>$para</strong>
    </div>";
}

echo $msgBoxEmail;
