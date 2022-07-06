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
    <title>Document</title>
    <style>
       
*{padding: 0; margin:0;-webkit-box-sizing: border-box;box-sizing: border-box;font-family: monospace;font-size: 1rem;color:#666; text-shadow: 5px 5px 10px #202020,
      -5px -5px 10px #464646; text-align: center; font-weight: 600;}
        body{
            min-height: 100vh;
            background-color: #333;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
                -ms-flex-pack: center;
                    justify-content: center;
            -webkit-box-align:center ;
                -ms-flex-align:center ;
                    align-items:center ;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                -ms-flex-direction: column;
                    flex-direction: column;
        }
        form{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                -ms-flex-direction: column;
                    flex-direction: column;
            -webkit-box-pack: center;
                -ms-flex-pack: center;
                    justify-content: center;
            -webkit-box-align: center;
                -ms-flex-align: center;
                    align-items: center;
            width: 50%;
            
        }

      

        input{
      margin-top: 10px;
      border: none;
      outline: none;
      border-radius: 20px;
      height: 30px;
      -webkit-box-shadow: 5px 5px 10px #202020,
      -5px -5px 10px #464646;
              box-shadow: 5px 5px 10px #202020,
      -5px -5px 10px #464646;
      background-color: #333;
      cursor: pointer;
        }
        label{
      margin-top: 10px;
        }

        #a{
            margin-top: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        span{
            color: #a70101;;
        }

    </style>
</head>
<body>
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