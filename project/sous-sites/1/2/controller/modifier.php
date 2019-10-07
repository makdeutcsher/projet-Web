<?php

include("../config/connection.php");

 $idd=$_POST['idd_'];
 $vh=$_POST['vh_'];
 $prix=$_POST['prix_'];
 $taxe=$_POST['taxe_'];
// $name=$_POST['name'];
// $type=$_POST['type'];

//var_dump($_POST) ;

 $sql = "UPDATE formations SET Volume_horaire='".$vh."',Prix='".$prix."',Taxe='".$taxe."' WHERE IDD =".$idd;
 $conn->query($sql);


?>