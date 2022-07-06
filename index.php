<?php

require ('./include/function.php');
require ('./include/pdo.php');




$sucess = false;
$errors = [];
if(!empty($_POST['submitted'])) {



    $nom = cleanXss('nom');
    $prenom = cleanXss('prenom');
    $email = cleanXss('email');
   
    $errors = validText($errors,$nom,'nom',2,100);
    $errors = validText($errors,$prenom,'prenom',2,100);
    $errors = validEmail($errors, $email, 'email');

    if(count($errors) === 0) {
       
        $sql = "INSERT INTO users (nom,prenom,email,created_at) VALUES (:nom,:prenom,:email,NOW())";
        $query = $pdo->prepare($sql);
       
        $query->bindValue(':nom',$nom, PDO::PARAM_STR);
        $query->bindValue(':prenom',$prenom, PDO::PARAM_STR);
        $query->bindValue(':email',$email, PDO::PARAM_STR);
        $query->execute();
        $last_id = $pdo->lastInsertId();
       
    }
}
?>











<!DOCTYPE html>
<html lang="fr">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
 
</head>
<body>

<header>
    <h1>Formulaire</h1>
    <nav>
        <ul>
            <li><a href="http://localhost/formulaire/list_users.php">Utilisateur</a></li>
            <li><a href="http://localhost/formulaire/">Accueil</a></li>
            <li><a href="http://localhost/formulaire/supp_user.php?id=1">404</a></li>
        </ul>
    </nav>
</header>

    <form action="" method="POST">
        
        <label for="nom">Nom </label>
        <input type="text" name="nom" id="nom">
        <span class="error"><?php if(!empty($errors['nom'])) { echo $errors['nom']; } ?></span>
       
       
        <label for="prenom">Prenom </label>
        <input type="text" name="prenom" id="prenom">
        <span class="error"><?php if(!empty($errors['prenom'])) { echo $errors['prenom']; } ?></span>
       
        <label for="email">Mail </label>
        <input type="text" name="email" id="email">
        <span class="error"><?php if(!empty($errors['email'])) { echo $errors['email']; } ?></span>
          
        <input id="a" type="submit" name="submitted" value="GO">
      
    </form>

    <script>
        const btn =document.querySelector('#a')
        btn.addEventListener('click' ,aller)

        function aller(){

btn.style.transform='perspective(500px) translateZ(-100px)'

        }
    </script>
</body>
</html>