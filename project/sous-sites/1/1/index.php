<?php
session_start();
?>

<!DOCTYPE html>

<head>
<meta charset="UTF-8">
<link href="View/public/css/external.css" rel="stylesheet" type="text/css" />
<script src="View/public/js/jquery-3.3.1.js"></script>
<script src="View/public/js/script1.js"></script>



</head>






<?php
// include("view/includes/entet.php");
include("view/includes/variables.php");
include("config/connection.php");
// require("controller/login.php");
// require("controller/logout.php");

   
  
$sql1="SELECT * FROM Type_formation t join Formations f where t.ID=f.ID  and f.id_categorie =1  and  f.id_ecole='1' ";
$sql2="SELECT * FROM Formations f where  f.id_categorie =1 and f.id_ecole='1' ";

$type_formation=$conn->query($sql1);
$formation=$conn->query($sql2);

function calculTTC($a,$b){
    return ($a*$b/100) +$a;
}

?>


<body>


<h1> <?php echo $titre_fr;?></h1></br>

</br></br></br>


<?php

if (!isset($_SESSION['user'])){
     echo "<h2 align =\"center\" > Sign In</h2>


     <form action='controller/login.php' method=\"post\">
   
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
    <form action='controller/logout.php' method='get' ><input type='submit' value='logout'></form>
    </div>";
    if ($_SESSION['admin']){
        echo 
        "<div id =\"GF\" align = \"center\"><a href='controller/gestion_formation.php'>Gestionaire des formations</a></div>"
        
        
        
        
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

<h3 align="center" >Liste Des Types Des Formations Proposées</h3>

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

</br></br>

<?php echo $video;?>

  </br></br>
  <h3 align="center" >Tableaux Des Détailles Des Formations Proposées</h3>

<table id ="my_table" border="1px" align="center">
    <thead>
    <tr>
    <th scope="col" >Formations</th>
    <th scope="col">Volume horaire</th>
    <th scope="col">Prix HT(DA)</th>
    <th scope="col">Taxe %</th>
    <th scope="col">Prix TTC</th>
    </tr>
    </thead>
    <tbody id="my-tab-index">
    <?php
    
    foreach ($formation as $formation_t): ?>
        <tr>
            <th id=<?= $formation_t['IDD'] ?>" scope="row"><?= $formation_t['Nom'] ?></th>
            <td id=<?= $formation_t['IDD'] ?>"><?= $formation_t['Volume_horaire'] ?></td>
            <td id=<?= $formation_t['IDD'] ?>"><?= $formation_t['Prix'] ?></td>
            <td id=<?= $formation_t['IDD'] ?>"><?= $formation_t ['Taxe'] ?></td>
            <td id=<?= $formation_t['IDD'] ?>"><?php echo calculTTC($formation_t['Prix'],$formation_t ['Taxe']) ;?></td>
            

        </tr>
    <?php endforeach; ?>


    </tbody>
   
    </table>&nbsp;&nbsp;&nbsp;  


  </br></br></br>


  <?php
include("view/includes/pied-page.php");

?>
  
</body>


</html>