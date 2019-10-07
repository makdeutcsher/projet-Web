<?php
session_start();
?>


<html>

   
<?php include("../includes/categories/head.php");
include("../../controller/afficher-membre.php");



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
                          
             

             <h2 align="center">Gestion des Membres</h2></br></br>


 <table id ="membre-table" border="1px" align="center" >
    <thead>
    <tr>
    <th scope="col" >User Name</th>    
    <th scope="col">Acces Level</th>
    <th scope="col" colspan="2">Opérations</th>
    </tr>
    </thead>
    <tbody id="membre-tab-index">
    
    
    <?php
    
    foreach ($users as $user) : ?>

    
    <tr>
   <td id=<?= $user->id ?>>
   <span class="user_txt text_<?= $user->id ?>" ><?= $user->user_name ?></span>
        <input class="select_input hiden_input_<?= $user->id ?>" value="<?= $user->user_name ?>"  id="user_name_<?= $user->id ?>">
        
        </td>


 <td id=<?= $user->id ?>>
   <span class="user_txt text_<?= $user->id ?>" ><?= ($user->admin)?'Admin':'User' ?></span>
        <select class="select_input hiden_input_<?= $user->id ?>"  id="admin_<?= $user->id ?>">
        <option value="0">0</option>
        <option value="1">1</option>
         </select>
        </td>


<?php
           
           if(isset($_SESSION['user']) &&  ($_SESSION['admin'])){             
                           
            echo "<td class=" . $user->id . "><button type=\"Submit\" id=\"supprimer\" class =\"delebtn\" value=\"Supprimer\" onclick='SupprimerMembre(" . $user->id . ")'>Supprimer</button></td>
            <td class=" . $user->id . "><button type=\"Submit\" data-is_edit=\"1\" data-id=" . $user->id . " class =\"btn-modifier updbtn\"  >Modifier</button></td> ";              
           }


     ?>





        </tr>
    <?php endforeach; ?>


    </tbody>
   
    </table>
    </br></br></br></br>
    <h2 align="center">Ajouter Un Nouveau Membre</h2></br>

    <form action="../../controller/ajouter-membre.php" align="center" method="post" style="width: 100%;text-align: -webkit-center;">
  <fieldset style="text-align: center;width: 50%;">
    <legend>Personal information:</legend>
    First name:<br>
    <input type="text" name="user_name" value="Mickey"><br>
    Password:<br>
    <input type="password" name="psw" value="Mouse"><br>
    Acces Level:<br>
    <select name="acc" >
        <option value="0">User</option>
        <option value="1">Admin</option>
         </select><br><br>

    <input type="submit" value="Submit">
  </fieldset>
</form>



























  
  </div>

    </div>

              </br></br></br>


        
        <script src="../public/js/comparer.js"> </script>
        <script src="../public/js/gestion_membre.js"> </script>
     
           <?php include("../includes/categories/footer.php"); ?>
    </body>


</html>






