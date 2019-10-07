<?php
session_start();
?>


<html>

   
<?php include("../includes/categories/head.php");
include("../../controller/afficher.php");
include("../../controller/afficher-commentaire-admin.php");
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
                          
             

             <h2 align="center">Comparaison d'Ecoles</h2></br></br>

  

            <div id="com">

             <div id="choisir-type" class="styled-select slate">          

             <select id="type">
             <option value="0">Choisir un type</option>
             <?php

            foreach ($cats as $row) {
                echo "<option value='" . $row['id_categorie'] . "'>" . $row['nom'] . "</option>";;
            }
            ?>

           </select>
           </div>&nbsp;&nbsp;&nbsp;
           
           <div id="choisir-ecole1"class="styled-select slate"> 
           <select id="ecole1">
            <option value="0">Choisir la 1ere école</option>
            <?php
            $fs = array_merge($fs1, $fs2, $fs3, $fs4, $fs5, $fs6);
            foreach ($fs as $f) : ?>
             <option value=<?= $f->id ?>><?= $f->nom ?></option>
           
           <?php endforeach;?>
           </select>
           </div>&nbsp;&nbsp;&nbsp;


            <div id="choisir-ecole2"class="styled-select slate"> 
           <select id="ecole2">
           <option value="0">Choisir la 2eme école</option>
            <?php
            $fs = array_merge($fs1, $fs2, $fs3, $fs4, $fs5, $fs6);
            foreach ($fs as $f) : ?>
             <option value=<?= $f->id ?>><?= $f->nom ?></option>
           
           <?php endforeach;?>
           </select>
           </div>&nbsp;&nbsp;&nbsp;


<div ><button id="btn-comparer"  > Comparer  </button></div>

            


           </div>

           <table border="3" align="center" cellpadding="5" id="compar_table" style=" width: 90%;margin-left: 20px;
    margin-top: 20px; display:none;text-align:center; "> 
                    <tbody><tr> <th>Critères</th> 
                    
                    <th><select id="form1">

                         </select>
                    
                    </th> <th><select id="form2">

                    </select></th> </tr>
                    <tr> <td>Volume_horaire</td> <td> - </td> <td> - </td> </tr>
                    <tr> <td>Prix</td> <td> - </td> <td> - </td> </tr>
                </tbody></table>

 </div>

  </div>

              </br></br></br>


        
        <script src="../public/js/comparer.js"> </script>
        
     
           <?php include("../includes/categories/footer.php"); ?>
    </body>


</html>






