






<?php

include("../core/connection.php");
include("../model/Formation.php");

 $idd=$_POST['idd_'];
 $actif=$_POST['actif_'] ? 0:1;

 

 $formation=new Formation();

$formation->setConnection($conn);

$formation->mettreLigne($idd,$actif);
 
// $name=$_POST['name'];
// $type=$_POST['type'];

//var_dump($_POST) ;

 
?>


