<?php 

$msgBoxEmail = "
<!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Rastreio</title>
    <style>body{background-color:#efefef}#resultados{width:78%;background-color:#fff;padding:5px;position:relative;margin:0 auto;overflow:hidden}.separa{margin-bottom:5px;margin-top:5px;font-size:13px;padding-right:15px;border:none}.separa2{margin-bottom:4px;margin-top:4px}.tabela{background-color:#fff}.tr{background-color:#fff;border-bottom:dotted 1px #ccc;padding:5px;color:#555}.tr:first-child{border-top:dotted 1px #ccc}.tr:last-child{border-bottom:none}.esquerda{width:30%;position:relative;float:left}.header{margin-top:10px;margin-bottom:10px;padding:5px;color:#444;overflow:hidden}.header h4{font-size:14px}.footer{margin-top:10px;margin-bottom:10px;padding:5px;color:#444;overflow:hidden}</style>
</head>
<body>

 <div id='resultados'>
       <div class='header'>
        <h4>Você pode acompanhar o envio com o código de rastreamento: <a href=\"{$url_rastreio}\">$obj</a></h4>
        </div>
    <div class='box-email'>
      $resultados
    </div>
    <div class='footer'>
            <h3>Dados do Envio</h3>
            <div class='dados-cliente'>Nome: <span>Italo</span></div>
            <div class='dados-cliente'>Email: <span>italo.luis.s@gmail.com</span></div>
            <div class='dados-cliente'>Whatsapp: <span>31 9 9334 6096</span></div>
            <div class='dados-cliente'>Endereço: <span>Ipatinga/MG</span></div>
        </div>
 </div>    
</body>
</html>";