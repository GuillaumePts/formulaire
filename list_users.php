<?php
require('./include/pdo.php');
require('./include/function.php');
?>
<?php
$select_users = "SELECT * FROM users ORDER BY created_at DESC";
$query = $pdo->prepare($select_users);
$query->execute();
$users = $query->fetchAll();
?>

<style>*{padding: 0; margin:0;-webkit-box-sizing: border-box;box-sizing: border-box;font-family: monospace;font-size: 1rem;color:#666; text-shadow: 5px 5px 10px #202020,
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
      
      
      tr{
        margin: 40px;
      }

      td{
        margin: 100px;
      }

      hr{
        width: 100%;
      }


      
      
      </style>
<h1>Liste des users</h1>
<a href="http://localhost/formulaire/">Accueil</a>
<table>
   <thead>
    <tr>
        <th>id</th>
        
        <th>nom</th>
       
        <th>prenom</th>
       
        <th>email</th>
   
        <th></th>
        <th></th>
    </tr>
   </thead>
   <tbody>
<?php foreach ($users as $user) { ?>
    <tr>
        <td><?=$user['id']?></td>
        <td><?=$user['nom']?></td>
        <td><?=$user['prenom']?></td>
        <td><?=$user['email']?></td>
        <td><a href="edit_user.php?id=<?=$user['id']?>">Editer</a></td>
        <td><a href="supp_user.php?id=<?=$user['id']?>">Supprimer</a></td>
            
    </tr>
   
<?php } ?>
   </tbody>
</table>


