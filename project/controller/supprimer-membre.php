<?php

include("../core/connection2.php");



$idd=$_POST['idd'];
//echo $idd;

$sql = "DELETE FROM users WHERE id=".$idd;
// echo($sql) ;
$conn->query($sql);


?>