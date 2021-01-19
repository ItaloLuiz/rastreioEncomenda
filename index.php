<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rastreio Correios</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <link href="css/index.css" rel="stylesheet">
</head>
<body>
    <section id="header">
        <div class="container">
            <div class="col-md-6 centro box">
                <h1 class="text-center">RASTREAMENTO CORREIOS - OBJETOS</h1>
                <h2>Informe o código do objeto abaixo</h2>
                <form name="form" id="form" method="post" action="resultado.php">
                    <div class="input-group">

                        <input type="text" name="obj" id="obg" class="form-control input-lg" placeholder="Ex: OA016913717BR" required>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-lg">Pesquisar</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>