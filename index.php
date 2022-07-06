<?php
require ('./include/function.php');
require ('./include/pdo.php');
require ('./insert.php')




?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
        <label for="prenom">Prenom :</label>
        <input type="text" name="prenom" id="prenom">
        <label for="email">Mail :</label>
        <input type="text" name="email" id="email">
        <input type="submit" name="submitted" value="Envoyer !">
    </form>
</body>
</html>