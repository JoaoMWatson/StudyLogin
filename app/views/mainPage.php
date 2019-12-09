<?php
require "/home/useless_guy/git/StudyLogin/app/utils/verifySession.php";
include "/home/useless_guy/git/StudyLogin/app/models/UserModel.php";

$user = new UserModel();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main pagina</title>
</head>
<body>
    <h1>Olá <?=$user->nome?></h1>
</body>
</html>