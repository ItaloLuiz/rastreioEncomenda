# Dev. Sistema de Informação

## Objetivo

    O objetivo desse exercício é construir uma aplicação em PHP, que permita
    receber status de rastreadores dos Correios e que encaminhe
    os resultados por email para um cliente

### Itens obrigatórios

    - Obter o status dessa entrega (OA016913717BR) por algum webservice
      (não é obrigatório utilizar o    próprio dos Correios);
    - Formatar esses status de entrega em um email, e disparar
      utilizando o PHPMailer (enviar para joao. macedo@elastic.fit).
      No corpo do email você pode colocar dados fictícios nos locais dos dados do cliente,
      mas é legal colocar seu nome pra ajudar na identificação;
    - Criar e anexar um PDF contendo das mesmas informações que contém no email.

### Comentários sobre o desenvolvimento do exercício

    1. Quais tecnologias usou
    
    Para obter os dados dos Correios foi feito um pequeno "scraper"
    no site dos correios para obter as informações, após essa etapa
    a próxima coisa a ser feita foi "limpar" o código obtido.

    Para o envio de email foi utilizado o PHP mailer pelo SMTP.
    
    Para gerar o PDF foi utilizado a biblioteca MPDF.

    2. Quais as maiores dificuldades

    Obter a informação necessária no site do correio foi um
    pouco "chato", inclusive creio que o código pode ser muito
    otimizado, o que pretendo fazer em breve.

    3. O que não conseguiu fazer e o motivo

    Os itens não obrigatórios, não foquei neles porque no momento
    tenho alguns serviços freelances para entregar, por esse motivo 
    o tempo ficou um pouco apertado, então priorizei os itens obrigatórios.

## Para testar o projeto

    O código desenvolvido para capturar as informações está
    dentro do arquivo: funcoes.php

    Para configurar o envio de emails basta renomear o arquivo:
    config_exemplo.php PARA config.php e colocar os dados de
    um SMTP.

    O arquivo resultado.php foi configurado com um $_REQUEST['obj'],
    para facilitar os testes, podendo nesse caso desde usar o index.php
    para enviar o código a ser rastreado via formulário ($_POST)
    ou informar o código na url do arquivo: resultado.php?obj=OA016913717BR
