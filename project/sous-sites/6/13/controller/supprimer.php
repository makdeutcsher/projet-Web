<?php

include("../config/connection.php");



$idd=$_POST['idd'];
//echo $idd;

$sql = "DELETE FROM formations WHERE IDD=".$idd;
$conn->query($sql);


?>