<?php

include "/home/useless_guy/git/StudyLogin/app/utils/alerts.php";

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="web/css/cadastro.css">
    <title>Registre</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Cadastrar</h5>
                        
                        <?php
                            showAlerts("success");
                            showAlerts("danger");
                        ?>

                        <form class="form-signin" action="app/controller/UserController.php?action=register" method="POST">
                            <div class="form-label-group">
                                <input type="text" name="name" id="inputUserame" class="form-control" placeholder="Nome" required autofocus>
                                <label for="inputUserame">Nome</label>
                            </div>

                            <div class="form-label-group">
                                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required>
                                <label for="inputEmail">Email</label>
                            </div>

                            <hr>

                            <div class="form-label-group">
                                <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Senha" required>
                                <label for="inputPassword">Senha</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="checkPass" id="inputConfirmPassword" class="form-control" placeholder="Confirmar Senha" required>
                                <label for="inputConfirmPassword">Confirmar senha</label>
                            </div>

                            <br>
                            <br>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>