<?php
include("../../core/connection.php");
include("../../model/commentaire.php");

$commentaire=new Commentaire();

$commentaire->setConnection($conn);

$id_categorie=$_GET['id_cat'];

// var_dump($id_categorie);


$cs = $commentaire->get($id_categorie);



?>