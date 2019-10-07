<?php
include("../../core/connection.php");
include("../../model/Categorie.php");

$categorie=new Categorie();

$categorie->setConnection($conn);


$cats = $categorie->get();
// var_dump($cats);
// $fs2 = $categorie->get(2);
// $fs3 = $categorie->get(3);
// $fs4 = $categorie->get(4);
// $fs5 = $categorie->get(5);
// $fs6 = $categorie->get(6);




?>