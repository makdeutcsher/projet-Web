<?php
session_start();
?>


<html>
   

 

<?php include("../includes/categories/head.php");

include("../../controller/afficher.php");
include("../../controller/afficher-categorie.php");


?>

     <body>
                
                <div class="logo"  align="center">
                <b> Schools <img src="../public/img/logo1.png" alt="image d'aceuil " > Compare</b>
                </div>

 </br></br></br>
                <?php

                if (!isset($_SESSION['user'])) {
                    echo " <div class='login' >
    <b><a href='../administration/login.php' align='center'><b>S'authentifier</b></a></b>
    </div>";




                } else {
                    $a = $_SESSION['admin'] ? "Admin" : "Utilisateur";
                    echo "<div id=\"logout_form\" align = \"center\"> Bienvenu  " . $_SESSION['user'] . "! &nbsp;Vous etes connecteé en tan que  " . $a . " !&nbsp;&nbsp;  
    <form action='../../controller/logout.php' method='get' ><input type='submit' value='logout'></form>
    </div>";

                }

                ?>



            
            </br></br>  
               <div class="diaporama">
                  <div class="images">
                      <img src="../public/img/0.jpg" class="diaporama_0"/>
                      <img src="../public/img/1.jpg" class="diaporama_1"/>
                      <img src="../public/img/2.jpg" class="diaporama_2"/>
                         
                  </div>
              </div>

 
            <div class ="Page">

        
                <div class="vertical-menu">
                   
                <a href="../../index.php"class="active">Accueil</a>
                <p id="menu" onclick="toggleMenu()"><a href="#"> Catégories </a></p>
                   <ul id="menu-box" style="display: block">
                   <li><a href="../categories/Universitaires.php"><b>Universitaires</b></a></li>
                        <li><a href="../categories/Professionnelles.php"><b>Professionnelles</b></a></li>
                        <li><a href="../categories/Secondaires.php"><b>Secondaires</b></a></li>
                        <li><a href="../categories/Moyennes.php"><b>Moyennes</b></a></li>
                        <li><a href="../categories/Primaires.php"><b>Primaires</b></a></li>
                        <li><a href="../categories/Maternelles.php"><b>Maternelles</b></a></li>

                
                    </ul>

                     <a href="#">A Propos</a>
                      </br></br>


                    <h2 align="center">Zone Publicitaire</h2>
                    <img src='../public/img/Djezzy.png'width="60" height="80"></br></br>
                       nouvelle promotion djezy :500da <==> 3000da!!
               </div>

              
              <div class="content"> 
                          
              <h2 align="center">Liste des Ecoles</h2>



 <table id ="univ-table" border="1px" align="center" >
    <thead>
    <tr>
    <th scope="col" >Nom</th>    
    <th scope="col">Domaine</th>
    <th scope="col">Wilaya</th>
    <th scope="col">Commune</th>  
    <th scope="col">Adresse</th>  
    <th scope="col">Téléphones</th>
    <th scope="col">Fax</th>
    <th scope="col" >Catégorie</th>

    <?php
    if (isset($_SESSION['user']) && ($_SESSION['admin'])) {
        echo "<th scope=\"col\"  colspan=\"3\">Opération</th>";
    }
    ?>
    </tr>
    </thead>
    <tbody id="univ-tab-index">
    
    
    <?php
    $i = 1;

    $fs = array_merge($fs1, $fs2, $fs3, $fs4, $fs5, $fs6);

    foreach ($fs as $f) : ?>
    
    <tr>
        <th  id=<?= $f->id ?>scope="row">
            
        <?php         
        if (($f->actif)){
        echo '<a class="lien" href="../../sous-sites/'.$f->id_categorie.'/'.$i.'/index.php" value='.$f->nom.' id=nom_'.$f->id.'>'
        .$f->nom.'</a></th>';      
        }else echo $f->nom.'</th>';?>

        
        <td id=<?= $f->id ?>>
        <span class="formation_txt text_<?= $f->id ?>" ><?= $f->domaine ?></span>
        <input class="formation_input hiden_input_<?= $f->id ?>" value="<?= $f->domaine ?>"  id="domaine_<?= $f->id ?>"/>
       </td>


        <td id=<?= $f->id ?>>
        <span class="formation_txt text_<?= $f->id ?>" ><?= $f->wilaya ?></span>
        <input class="formation_input hiden_input_<?= $f->id ?>" value="<?= $f->wilaya ?>"  id="wilaya_<?= $f->id ?>"/>
        </td>


        <td id=<?= $f->id ?>>
        <span class="formation_txt text_<?= $f->id ?>" ><?= $f->commune ?></span>
        <input class="formation_input hiden_input_<?= $f->id ?>" value="<?= $f->commune ?>"  id="commune_<?= $f->id ?>"/>
        </td>


        <td id=<?= $f->id ?>>
        <span class="formation_txt text_<?= $f->id ?>" ><?= $f->adresse ?></span>
        <input class="formation_input hiden_input_<?= $f->id ?>" value="<?= $f->adresse ?>"  id="adresse_<?= $f->id ?>"/>
        </td>


        <td id=<?= $f->id ?>>
        <span class="formation_txt text_<?= $f->id ?>" ><?= $f->tel ?></span>
        <input class="formation_input hiden_input_<?= $f->id ?>" value="<?= $f->tel ?>"  id="tel_<?= $f->id ?>"/>
        </td>


        <td id=<?= $f->id ?>>
        <span class="formation_txt text_<?= $f->id ?>" ><?= $f->fax ?></span>
        <input class="formation_input hiden_input_<?= $f->id ?>" value="<?= $f->fax ?>"  id="fax_<?= $f->id ?>"/>
        </td>
        <td id="<?= $f->id_categorie ?>">
        <?php
        switch ($f->id_categorie) {
            case 1:
                echo "Universitaires";
                break;
            case 2:
                echo "Professionnelles";
                break;
            case 3:
                echo "Secondaires";
                break;
            case 4:
                echo "Moyennes";
                break;
            case 5:
                echo "Primaires";
                break;
            case 6:
                echo "Maternelles";
                break;
        }; ?>
    
    </td>
            

<?php

$me=$f->actif ? "Mettre Hors Ligne" : "Mettre En Ligne";

if (isset($_SESSION['user']) && ($_SESSION['admin'])) {

    echo "<td class=" . $f->id . "><button type=\"Submit\" id=\"supprimer\" class =\"delebtn\" value=\"Supprimer\" onclick='Supprimer(" . $f->id . ")'>Supprimer</button></td>
            <td class=" . $f->id . "><button type=\"Submit\" data-is_edit=\"1\" data-id=" . $f->id . " class =\"btn-modifier updbtn\"  data-id-cat=" . $f->id_categorie .">Modifier</button></td>
            <td class=" . $f->actif . "><button id= btn_".$f->id." type=\"Submit\" ";
            if($f->actif){ echo "class='mise_ligne'  style=\"background-color:#2fa016;\" onclick='mise_ligne(" .$f->id. "," .$f->actif. ")'>$me</button></td>";}
            else{
                echo "class='mise_ligne'  style=\"background-color:#82c673;\" onclick='mise_ligne(" .$f->id. "," .$f->actif. ")'>$me</button></td>";

            }


}
$i++;
?>

 
        </tr>
    <?php endforeach;

    ?>


    </tbody>
   
    </table>
</br></br>

   <?php
if (isset($_SESSION['user']) && $_SESSION['admin']){
   
    
    echo "<div id=\"form\" align=\"center\">";
    echo " <form action=\"ajouter.php\" method=\"post\" id=\"my_form\">
          <h3>Ajouter une nouvelle école </h3>   
          <select name='type'>";

foreach ($cats as $row){
 echo "<option value='".$row['id_categorie']."'>".$row['nom']."</option>";
}
echo "</select></br></br>";
    echo " 

    <label>Nom de l'école:</label></br></br>
    <input id=\"name\" type=\"text\" name=\"name\" value=\"math\" /></br></br>
    <label>Domain:</label></br></br>
    <input id=\"domaine\" type=\"text\" name=\"vh\" value=\"math-appliqués\" /></br></br>
    <label>wilaya</label>:</br></br>
    <input id=\"wilaya\" type=\"text\" name=\"prix\" value=\"bejaia\" /></br></br>
    <label>commune</label>:</br></br>
    <input id=\"commune\" type=\"text\" name=\"taxe\" value=\"tichy\"/></br></br>
    <label>adresse</label>:</br></br>
    <input id=\"adresse\" type=\"text\" name=\"taxe\" value=\"tichy\"/></br></br>
    <label>tel</label>:</br></br>
    <input id=\"tel\" type=\"text\" name=\"taxe\" value=\"0551342351\"/></br></br>
    <label>fax</label>:</br></br>
    <input id=\"fax\" type=\"text\" name=\"taxe\" value=\"0551342351\"/></br></br>
    <label>catégorie</label>:</br></br>
    <input id=\"id_categorie\" type=\"text\" name=\"taxe\" value=\"1\"/></br></br>
    
    <input id=\"ajouter\" class='submit-input' type=\"Submit\" value=\"ajouter\" name=\"ajouter\"
     ></input>
    

</form>
</div>
&nbsp;&nbsp;&nbsp; ";
}
?>
   


 </div>

  </div>

              </br></br></br>


        
        <script src="../public/js/gestion_ecole.js"> </script>
       
           <?php include("../includes/categories/footer.php"); ?>
    </body>


</html>






