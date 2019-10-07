<?php include("../core/connection.php");

$tri_par = $_GET['par'];
$ordre = $_GET['ordre'];
$id = $_GET['id_cat'];

$sql="SELECT * FROM formation where id_categorie=".$id." order by ".$tri_par." ".$ordre;


$formation = $conn->query($sql);


// var_dump( $formation->fetchAll() );

echo( json_encode( $formation->fetchAll() , true) );


?>