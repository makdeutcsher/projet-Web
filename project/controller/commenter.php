<?php
include("../core/connection.php");
include("../model/commentaire.php");


// var_dump($_POST);


$id_categorie=$_POST['id_cat'];
$user_name=$_POST['user_name'];
$description=$_POST['description'];

$date = date('Y-m-d H:i:s');
$commentaire=new Commentaire($user_name, $description,$id_categorie,$date);

$commentaire->setConnection($conn);

$commentaire->save($user_name, $description,$id_categorie,$date);



?>