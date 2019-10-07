<?php
include("../../core/connection.php");
include("../../model/commentaire.php");

$commentaire=new Commentaire();

$commentaire->setConnection($conn);



// var_dump($id_categorie);


$cs1 = $commentaire->get(1);
$cs2 = $commentaire->get(2);
$cs3 = $commentaire->get(3);
$cs4 = $commentaire->get(4);
$cs5 = $commentaire->get(5);
$cs6 = $commentaire->get(6);



?>