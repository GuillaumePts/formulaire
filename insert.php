<?php

require ('./include/function.php');
require ('./include/pdo.php');
require ('./index.php');

$success = false;
$errors = array();
if(!empty($_POST['submitted'])) {
   


    $title = cleanXss('title');
    $content = trim(strip_tags($_POST['content']));
    $mail = trim(strip_tags($_POST['mail']));
   
    $errors = validText($errors,$title,'title',3,100);
    $errors = validText($errors,$content,'content',10,1000);
    $errors = validEmail($errors, $mail, 'mail');
  

    if(count($errors) === 0) {
     
        $sql = "INSERT INTO  (title,content,email,created_at) VALUES (:title,:content,:mail,NOW())";
        $query = $pdo->prepare($sql);
       
        $query->bindValue(':title',$title, PDO::PARAM_STR);
        $query->bindValue(':content',$content, PDO::PARAM_STR);
        $query->bindValue(':mail',$mail, PDO::PARAM_STR);
        $query->execute();
        $last_id = $pdo->lastInsertId();
        header('Location: detail-beer.php?id=' . $last_id);

    }
}
