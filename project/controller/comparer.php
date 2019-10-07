<?php include("../core/connection2.php");


$id1 = $_GET['par1'];

$id2 = $_GET['par2'];

$id_cat = $_GET['par3'];

// var_dump($id1);
// echo($id1);


$sql="SELECT * FROM formations f  where f.id_categorie=".$id_cat." and (f.id_ecole='".$id1."' or f.id_ecole='".$id2."')";
//  echo($sql);

$formation = $conn->query($sql);


// var_dump( $formation->fetchAll() );

echo( json_encode( $formation->fetchAll() , true) );


?>