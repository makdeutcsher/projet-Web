<?php

include("../core/connection.php");
include("../model/Formation.php");

//  $idd=$_POST['idd_'];
 $nom=$_POST['nom'];
 $domaine=$_POST['domaine'];
 $wilaya=$_POST['wilaya'];
 $commune=$_POST['commune'];
 $adresse=$_POST['adresse'];
 $tel=$_POST['tel'];
 $fax=$_POST['fax'];
 $id_categorie=$_POST['categorie'];

 $formation=new Formation();

$formation->setConnection($conn);

$formation->save($nom,$domaine, $wilaya,$commune,$adresse,$tel,$fax,$id_categorie);
 
// $name=$_POST['name'];
// $type=$_POST['type'];

//var_dump($_POST) ;

 
?>