<?php

include("../core/connection2.php");
include("../model/Utilisateur.php");

 $idd=$_POST['idd_'];
 $nom=$_POST['nom_'];
 $acc=$_POST['acc']; 

$user=new Utilisateur();

$user->setConnection($conn);

$user->update($idd,$nom,$acc);
 
// $name=$_POST['name'];
// $type=$_POST['type'];

//var_dump($_POST) ;

 
?>