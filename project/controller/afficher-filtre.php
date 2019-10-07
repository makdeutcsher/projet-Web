<?php include("../core/connection.php");

$filter = $_GET['like'];
$id_categorie = $_GET['id_cat'];

$sql='SELECT *  FROM formation 
WHERE id_categorie='.$id_categorie.' and  Concat(" ",nom, domaine, wilaya, commune, adresse, tel, fax," ")  LIKE "%'.$filter.'%"';


$formation = $conn->query($sql);


// var_dump( $formation->fetchAll() );

echo( json_encode( $formation->fetchAll() , true) );


?>