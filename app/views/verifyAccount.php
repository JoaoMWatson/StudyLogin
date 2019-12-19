<?php

include "/home/useless_guy/git/StudyLogin/app/utils/alerts.php";
?>

<!DOCTYPE html>
<html lang="en">


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="web/css/cadastro.css">

    <title>Verificar Conta</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-8 mx-auto">
                <div class="card card-signin flex-row my-4">
                    <div class="card-body">
                        <h5 class="text-center">Verificar Cadastro</h5>

                        <?php
                        showAlerts("success");
                        showAlerts("danger");
                        ?>

                        <form class="form-signin" action="app/controller/UserController.php?action=verifyCode" method="POST">
                            <div class="form-label-group">
                                <input type="text" name="code" id="inputUserame" class="form-control" placeholder="Codigo de Verificação" required autofocus>
                                <label for="inputUserame">Insira seu codigo aqui!</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Enviar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
