<?php

include("../core/connection.php");


$idd=$_POST['idd'];
//echo $idd;

$sql = "DELETE FROM formation WHERE id=".$idd;
$conn->query($sql);


?>