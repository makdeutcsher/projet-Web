<?php
include("../view/includes/variables.php");
include("../config/connection.php");
   
  
$sql2="SELECT * FROM Formations";

$formation=$conn->query($sql2)->fetchAll();

function calculTTC($a,$b){
    return ($a*$b/100) +$a;
}


    $rs='';
   
    foreach ($formation as $formation_t){
        $ttc=calculTTC($formation_t['Prix'],$formation_t ['Taxe']);
        $rs .='<tr>
        <th id='.  $formation_t["IDD"] .'" scope="row">'. $formation_t["Nom"].'</th>
        <th id='.  $formation_t["IDD"] .'" scope="row">'. $formation_t["Volume_horaire"].'</th>
        <th id='.  $formation_t["IDD"] .'" scope="row">'. $formation_t["Prix"].'</th>
        <th id='.  $formation_t["IDD"] .'" scope="row">'. $formation_t["Taxe"].'</th>
        <th id='.  $formation_t["IDD"] .'" scope="row">'. $ttc .'</th></tr>';
    }
        var_dump($rs);



        return $rs;

       
    ?>