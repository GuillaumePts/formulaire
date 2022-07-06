<?php
require('./include/pdo.php');

//DELETE FROM USERS WHERE ID


require('./include/function.php');

if(!empty($_POST['id']) && is_numeric($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM users WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$id, PDO::PARAM_INT);
    $query->execute();
    $beer = $query->fetch();
    // debug($beer);
    if(empty($beer)) {
        header('Location: 404.php');
    }
} /*else {
   
    header('Location: 404.php');
}*/

?>
<style>

    img{
        width: 100%;
    }
</style>
<img src="./mamaz.jpg">