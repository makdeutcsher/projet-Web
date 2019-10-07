<?php
session_start();
?>


<html>
   
<?php include("../includes/categories/head.php");
include("../../controller/afficher.php");
include("../../controller/afficher-commentaire-admin.php");


?>
     
     <body>
     <div class="logo"  align="center">
                <b> Schools <img src="../public/img/logo1.png" alt="image d'aceuil " > Compare</b>
                </div>
            
                </br></br></br>
                <?php

                if (!isset($_SESSION['user'])) {
                    echo " <div class='login' >
    <b><a href='../../view/administration/login.php' align='center'><b>S'authentifier</b></a></b>
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
                      <li><a href="Universitaires.php"><b>Universitaires</b></a></li>
                           <li><a href="Professionnelles.php"><b>Professionnelles</b></a></li>
                           <li><a href="Secondaires.php"><b>Secondaires</b></a></li>
                           <li><a href="Moyennes.php"><b>Moyennes</b></a></li>
                           <li><a href="Primaires.php"><b>Primaires</b></a></li>
                           <li><a href="Maternelles.php"><b>Maternelles</b></a></li>
   
                   
                           </ul>

                   <a href="#">A Propos</a>
                   </br></br>
                    
                    <h2 align="center">Zone Publicitaire</h2>
                    <img src='../public/img/Djezzy.png'width="60" height="80"></br></br>
                       nouvelle promotion djezy :500da <==> 3000da!!
               </div>

              
              <div class="content"> 
                          
             
              <h2 align="center">Liste Des Ecoles Primaires </h2></br></br>

             
             <div class="tri-filtre">   
    <div classs="tri">       
<h3>Trier selon :</h3>
<select>
  <option value="nom">Nom</option>
  <option value="wilaya">Wilaya</option>
  <option value="commune">Commune</option>  
</select>

<select>
  <option value="asc">Ordre Croissant</option>
  <option value="desc">Ordre Décroissant</option>
   
</select>

<button type="submit" id="tri-btn" >Trier</button>
</div> 


<div class="filtre" >       
<h3>filtre par mot-clé :</h3>
<input type="text" placeholder="Entrer un mot-clé" name="mot-clé" required>
<button type="submit" class="filtre-btn"  id="filtre-btn">filtrer</button>
</div>
</div>
</br></br></br>

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
    <th scope="col">Catégorie</th>


    <?php
    if(isset($_SESSION['user']) &&  !($_SESSION['admin'])){
    echo "<th scope=\"col\">Commentaire</th>";}
?>

    </tr>
    </thead>
    <tbody id="univ-tab-index">
    
    <?php
$i=10;
    foreach ($fs5 as $f5) : ?>
        <tr>
        <th  id=<?= $f5->id_categorie ?>scope="row">
        <?php         
        if (($f5->actif)){
        echo '<a class="lien" href="../../sous-sites/'.$f5->id_categorie.'/'.$i.'/index.php">
        '.$f5->nom.'</a></th>';      
        }else echo $f5->nom.'</th>';
        ?></th>            <td id=<?= $f5->id_categorie ?>><?= $f5->domaine ?></td>
            <td id=<?= $f5->id_categorie ?>><?= $f5->wilaya ?></td>
            <td id=<?= $f5->id_categorie ?>><?= $f5->commune ?></td>
            <td id=<?= $f5->id_categorie ?>><?= $f5->adresse ?></td>
            <td id=<?= $f5->id_categorie ?>><?= $f5->tel ?></td>
            <td id=<?= $f5->id_categorie ?>><?= $f5->fax ?></td>
            <td >Primaires</td>
           
            
<?php
           
           if(isset($_SESSION['user']) &&  !($_SESSION['admin'])){             
                           
               echo "<td class=\" .$f5->id_categorie.\"><a class=\"lien\" href=\"../administration/commentaire.php?id_cat=$f5->id_categorie\">Commenter</a></td>";
               
           }
$i++;
      ?>

           
            

        </tr>
    <?php endforeach; ?>

    </tbody>
   
    </table>






              </div>


            </div>





    <?php
    if(isset($_SESSION['user']) &&  ($_SESSION['admin'])){
    echo "<h2 align='center'>Liste Des Commentaires </h2></br>

<table id ='commentaire-table' border='1px' align='center' width='auto'>
    <thead>
    <tr>
    <th scope='col' >Utilisateur</th>    
    <th scope='col'>Description</th>
    <th scope='col'>Date</th>
    <th scope='col' colspan='2'>Opérations</th>
    
    

    </tr>
    </thead>
    <tbody id='commentaire-tab-index'>";
    
    
    foreach ($cs5 as $cs)
    echo  '<tr>
        
        <td id="'.$cs->id.'">'.$cs->user_name.'</td>
        <td id="'.$cs->id.'" >'. $cs->description.' </td>
        <td id="'.$cs->id.'"> '.$cs->date.' </td>
        <td id="'.$cs->id.'" ><button type="Submit" id="répondre" class ="répondre" value="Répondre" >Répondre</button></td>
        <td class="'.$cs->id.'"><button type="Submit" id="supprimer" class ="delebtn" value="Supprimer" onclick=\'Supprimer_commentaire("'.$cs->id.'")\'>Supprimer</button></td>
        </tr>';

       
    echo '</tbody>
    </table>';



    
}?>






 </div>
              </br></br></br>

            <?php include("../includes/categories/footer.php"); ?>
            <script src="../public/js/tri&filter.js"> </script>
    </body>

</html>




