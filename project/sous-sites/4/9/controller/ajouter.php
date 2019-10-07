<?php


include("../model/Formation.php");
include("../config/connection.php");



$vh=$_POST['vh'];
$prix=$_POST['prix'];
$taxe=$_POST['taxe'];
$name=$_POST['name'];
$type=$_POST['type'];

$f=new Formation($vh,$prix,$taxe,$name,$type);

$f->setConnection($conn);

$f->save();

?>