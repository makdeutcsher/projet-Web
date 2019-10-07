<?php
include("../core/connection2.php");
include("../model/Utilisateur.php");


$user_name=$_POST['user_name'];
$psw=md5($_POST['psw']);
$acc=$_POST['acc'];

$utilisateur=new Utilisateur();

$utilisateur->setConnection($conn);

$utilisateur->save($user_name,$psw,$acc);
header('location: ../view/administration/gestion_membre.php');
?>