<?php
session_start();

?>

<!DOCTYPE html>



<head>
<meta charset="UTF-8">
<link href="../View/public/css/external.css" rel="stylesheet" type="text/css" />
<script src="../View/public/js/jquery-3.3.1.js"></script>
<script src="../View/public/js/script.js"></script>



</head>





<?php
// include("../view/includes/entet.php");
include("../view/includes/variables1.php");
include("../config/connection.php");
// include("controller/login.php");
// include("controller/logout.php");

   

   
  
$sql1="SELECT * FROM Type_formation t join Formations f WHERE f.ID = t.ID ORDER BY nom ASC , st2 ASC";
$sql2="SELECT * FROM Type_formation";


$formation_t=$conn->query($sql1);
$type_formation=$conn->query($sql2);


function calculTTC($a,$b){
    return ($a*$b/100) +$a;
}

?>


<body>


<h1 > <?php echo $titre_fr;?></h1></br>

</br></br></br>




<?php

if (!isset($_SESSION['user'])){
     echo "<h2 align =\"center\"> Sign In</h2>


     <form action=\"login.php\" method=\"post\">
   
   <div class=\"container\" >
     <label for=\"uname\"><b>Username</b></label>
     <input type=\"text\" placeholder=\"Enter Username\" name=\"uname\" required>
 
     <label for=\"psw\"><b>Password</b></label>
     <input type=\"password\" placeholder=\"Enter Password\" name=\"psw\" required>
 
     <button type=\"submit\" class=\"loginbtn\">Login</button>
     <label>
       <input type=\"checkbox\" checked=\"checked\" name=\"remember\"> Remember me
     </label>
   </div>
 
   <div class=\"container\" style=\"background-color:#f1f1f1\">
     <button type=\"button\" class=\"cancelbtn\">Cancel</button>
     <span class=\"psw\">Forgot <a href=\"#\">password?</a></span>
   </div>
 </form>";}
else {
    $a=$_SESSION['admin']? "Admin":"Utilisateur";
    echo "<div id=\"logout_form\" align = \"center\"> Bienvenu  ".$_SESSION['user']."! &nbsp;Vous etes connecteé en tan que  ".$a." !&nbsp;&nbsp;  
    <form action='../controller/logout.php' method='get' ><input class='submit-input' type='submit' value='logout'></form>
    </div>";
    if ($_SESSION['admin']){echo 
    "<div id =\"GF\" align = \"center\"><a href='gestion_formation.php'>Gestionaire des formations</a></div></br></br>
     
    <h3>Panel du gestion de themes</h3>
     <div ' align='center' id='panel_getion'>     
     <label>Gérer la couleur du titre </label>
     <input type='color' id='input_color' onchange='change_color_tilte(this)' value='#5dad7a'> 
     &nbsp;&nbsp;
     
     
     <label>Gérer la couleur du background </label>
     <input type='color' id='input_color' onchange='change_color_background(this)' value='#FFFFFF'> 
     &nbsp;&nbsp;
     
     
     <label>Gérer les diaporamas </label>
     <select name='diapo'>
     <option value='1'>diapo 1</option>
     <option value='2'>diapo 2</option>
     <option value='3'>diapo 3</option>
     <option value='4'>diapo 4</option>
     </select>
     </div>"  
    ;}
    
}

?>


</br></br></br>


<div class="diaporama">
    <div class="images">
    <?php echo $img0 ;?>
    <?php echo $img1 ;?>
    <?php echo $img2;?>
    <?php echo $img3;?>       
    </div>
</div>
</br></br></br>

</br></br>


<div align="center" class="menu header" id="myHeader">


<ul id="nav">

    <?php
    
    foreach ($type_formation as $row): ?>
    <li id="<?= $row['ID'] ?>" class="formation"><a class="lien"
                                                          href="#"> <?= $row['st1'] ?> </a>
        <ul>
            
            <li><a href="#lien1"><?= $row['st2'] ?></a></li>
        </ul>
    </li>
<?php endforeach; ?>

</ul>

</div>




</br></br></br>

<table id ="my_table" border="1px" align="center">
    <thead>
    <tr>
    <th scope="col" >Formations</th>
    <th scope="col">Volume horaire(heure)</th>
    <th scope="col">Prix HT(DA)</th>
    <th scope="col">Taxe %</th>
    <th scope="col">Prix TTC</th>
    <?php
            if (isset($_SESSION['user']) &&  $_SESSION['admin']){ 
                echo "<th>Supprimer</th>
                      <th>Modifier</th>";}
    ?>                  
     
    </tr>
    </thead>
    <tbody>
    <?php
  
    foreach ($formation_t as $row): ?>

    
        <tr>
            <th class="<?= $row['IDD'] ?>" scope="row"><?= $row['Nom'] ?></th>

            <td class="<?= $row['IDD'] ?>">
                <span class="formation_txt text_<?= $row['IDD'] ?>" > <?= $row['Volume_horaire'] ?> </span>
                <input class="formation_input hiden_input_<?= $row['IDD'] ?>" value="<?= $row['Volume_horaire'] ?>" type="number" id="vh_<?= $row['IDD'] ?>"/>
            </td>

            <td class="<?= $row['IDD'] ?>">
                <span class="formation_txt text_<?= $row['IDD'] ?>" > <?= $row['Prix'] ?> </span>
                <input class="formation_input hiden_input_<?= $row['IDD'] ?>" value="<?= $row['Prix'] ?>" type="number"id="prix_<?= $row['IDD'] ?>"/>
            </td>

            <td class="<?= $row['IDD'] ?>">
                <span class="formation_txt text_<?= $row['IDD'] ?>" > <?= $row['Taxe'] ?> </span>
                <input class="formation_input hiden_input_<?= $row['IDD'] ?>" value="<?= $row['Taxe'] ?>" type="number"id="taxe_<?= $row['IDD'] ?>"/>
            </td>

            <td class="<?= $row['IDD'] ?>"><?php echo calculTTC($row['Prix'],$row ['Taxe']) ;?></td>


           <?php
            if (isset($_SESSION['user']) &&  $_SESSION['admin']){             
            echo "<td class=" .$row['IDD']."><button type=\"Submit\" id=\"supprimer\" class =\"delebtn\" value=\"Supprimer\" onclick='Supprimer(".$row['IDD'].")'>Supprimer</button></td>
            <td class=" .$row['IDD']."><button type=\"Submit\" data-is_edit=\"1\" data-id=". $row['IDD']." class =\"btn-modifier updbtn\">Modifier</button></td>";
            }
           ?>

        </tr>
    <?php endforeach; ?>


    </tbody>
   
    </table>&nbsp;&nbsp;&nbsp;  
    </br></br></br>

<?php
if (isset($_SESSION['user']) && $_SESSION['admin']){
    $sql2 = "SELECT * FROM Type_formation ";
    $sql3 = "SELECT COUNT(*) FROM formations";
    $nb=$conn->query($sql3);
    
    echo "<div id=\"form\" align=\"center\">";
    echo " <form action=\"ajouter.php\" method=\"post\" id=\"my_form\">
          <h3>Ajouter une nouvelle formation </h3>   
          <select name='type'>";

foreach (($conn->query($sql2)) as $row){
 echo "<option value='".$row['ID']."'>".$row['st1']."</option>";
}
echo "</select></br></br>";
    echo " 

    <label>Nom de la formation:</label></br></br>
    <input id=\"name\" type=\"text\" name=\"name\" value=\"math\" /></br></br>
    <label>Volume horaire:</label></br></br>
    <input id=\"vh\" type=\"text\" name=\"vh\" value=\"40\" /></br></br>
    <label>Prix HT</label>:</br></br>
    <input id=\"prix\" type=\"text\" name=\"prix\" value=\"650\" /></br></br>
    <label>Taxe</label>:</br></br>
    <input id=\"taxe\" type=\"text\" name=\"taxe\" value=\"15\"/></br></br>
    
    <input id=\"ajouter\" class='submit-input' type=\"Submit\" value=\"ajouter\" name=\"ajouter\"
     ></input>
    

</form>
</div>
&nbsp;&nbsp;&nbsp; ";
}

include("../view/includes/pied-page.php");

?>
  
</body>


</html>

