<?php

$blocoPDF = "
    <!--mpdf <!DOCTYPE html>
    <html lang='pt-BR'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Rastreio</title>
        <link rel='stylesheet' href='css/style.css'>
    </head>
    <body>

    <div id='resultados'>
        <div class='header'>                
                <h4>Você pode acompanhar o envio com o código de rastreamento: <a href='{$url_rastreio}'>$obj</a></h4>
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
    </html>mpdf-->";
