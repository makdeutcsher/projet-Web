<?php include("../../core/connection2.php");
include("../../model/Utilisateur.php");

$user=new Utilisateur();

$user->setConnection($conn);


$users = $user->getAll();


?>