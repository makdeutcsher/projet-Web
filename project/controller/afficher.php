<?php
include("../../core/connection.php");
include("../../model/Formation.php");

$formation=new Formation();

$formation->setConnection($conn);


$fs1 = $formation->get(1);
//var_dump($fs1);
$fs2 = $formation->get(2);
$fs3 = $formation->get(3);
$fs4 = $formation->get(4);
$fs5 = $formation->get(5);
$fs6 = $formation->get(6);


?>