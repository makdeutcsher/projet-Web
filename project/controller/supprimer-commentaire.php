<?php

include("../core/connection.php");



$idd=$_POST['idd'];
//echo $idd;

$sql = "DELETE FROM commentaire WHERE id=".$idd;
// echo($sql) ;
$conn->query($sql);


?>