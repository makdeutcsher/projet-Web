<?php

include("../core/connection.php");
include("../model/Formation.php");

 $idd=$_POST['idd_'];
 $nom=$_POST['nom_'];
 $domaine=$_POST['domaine_'];
 $wilaya=$_POST['wilaya_'];
 $commune=$_POST['commune_'];
 $adresse=$_POST['adresse_'];
 $tel=$_POST['tel_'];
 $fax=$_POST['fax_'];
 $id_categorie=$_POST['id_categorie_'];

 $formation=new Formation();

$formation->setConnection($conn);

$formation->update($idd,$nom,$domaine, $wilaya,$commune,$adresse,$tel,$fax,$id_categorie);
 
// $name=$_POST['name'];
// $type=$_POST['type'];

//var_dump($_POST) ;

 
?>