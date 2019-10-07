<?php
session_start();
?>


<html>
    
    <?php include("view/includes/home/home-head.php"); ?>

     
     <body onload="carousel()">



                 
                <div class="logo" >
                <b>Schools<img src="view/public/img/logo1.png" alt="image d'aceuil " > Compare</b>
                </div>
                </br></br></br>
                <?php

                if (!isset($_SESSION['user'])) {
                    echo " <div class='login' >
    <b><a href='view/administration/login.php' align='center'><b>S'authentifier</b></a></b>
    </div>";




                } else {
                    $a = $_SESSION['admin'] ? "Admin" : "Utilisateur";
                    echo "<div id=\"logout_form\" align = \"center\"> Bienvenu  " . $_SESSION['user'] . "! &nbsp;Vous etes connecteé en tan que  " . $a . " !&nbsp;&nbsp;  
    <form action='controller/logout.php' method='get' ><input type='submit' value='logout'></form>
    </div>";

                }

                ?>

</br></br></br></br>
               


              <div class="slider">
                    <div class="w3-content w3-section" style="max-width:500px">
                        <img class="mySlides" src="view/public/img/0.jpg" style="width:100%">
                        <img class="mySlides" src="view/public/img/1.jpg" style="width:100%">
                        <img class="mySlides" src="view/public/img/2.jpg" style="width:100%">
                    </div>

 </div>







 
            <div class ="Page">
            
        
            <div class="vertical-menu">
                   
                   <a href="index.php"class="active">Accueil</a>

                   <p id="menu" onclick="toggleMenu()"><a href="#"> Catégories </a></p>
                   <ul id="menu-box" style="display: block">
                   <li><a href="view/categories/Universitaires.php"><b>Universitaires</b></a></li>
                   <li><a href="view/categories/Professionnelles.php"><b>Professionnelles</b></a></li>
                   <li><a href="view/categories/Secondaires.php"><b>Secondaires</b></a></li>
                   <li><a href="view/categories/Moyennes.php"><b>Moyennes</b></a></li>
                   <li><a href="view/categories/Primaires.php"><b>Primaires</b></a></li>
                   <li><a href="view/categories/Maternelles.php"><b>Maternelles</b></a></li>
                </ul>
                   
                

                      <a href="#">A Propos</a>
                      </br></br>
                       
                       <h2 align="center">Zone Publicitaire</h2>
                       <img src='view/public/img/Djezzy.png'width="60" height="80"></br></br>
                       nouvelle promotion djezy :500da <==> 3000da!!

                  </div>

              <div class="content"> 
              <h2 align="center">Liste des Catégogies de Formations</h2></br></br>
              <ul class="cadre">
                        
                       <li class="c"><a href="view/categories/Universitaires.php"><img src='view/public/img/mgg.png' width="60" height="80" /><b>Universitaires</b></a></li>
                        <li class="c"><a href="view/categories/Professionnelles.php"><img src='view/public/img/mgg.png' width="60" height="80" /><b>Professionnelles</b></a></li>
                        <li class="c"><a href="view/categories/Secondaires.php"><img src='view/public/img/mgg.png' width="60" height="80" /><b>Secondaires</b></a></li></br></br>
                        <li class="c"><a href="view/categories/Moyennes.php"><img src='view/public/img/mgg.png' width="60" height="80" /><b>Moyennes</b></a></li>
                        <li class="c"><a href="view/categories/Primaires.php"><img src='view/public/img/mgg.png' width="60" height="80" /><b>Primaires</b></a></li>
                        <li class="c"><a href="view/categories/Maternelles.php"><img src='view/public/img/mgg.png' width="60" height="80" /><b>Maternelles</b></a></li></br>

                    </ul>
                 
                    </br></br></br>

                    <div style="justify-content:space-between; " align="center" >

                     <h2 align="center">
                     <b><a href="view/administration/comparaison.php"  id="comparer">Comparaison d'Ecoles</a></b>
                     </h2>
                     </br></br>

                     <?php if(isset($_SESSION['user']) &&  ($_SESSION['admin'])){
                     echo "<h2 align='center'>
                     <b><a href='view/administration/gestion_ecole.php'  id='gerer'>Gestion des Ecoles</a></b>
                     </h2></br>

                     <h2 align='center'>
                     <b><a href='view/administration/gestion_membre.php'  id='gerer'>Gestion des Membres</a></b>
                     </h2></br>";
                     
                     }
                     
                     ?>
                     </div>

              </div>

 
            </div>


</br></br></br></br>


 <?php include("view/includes/home/home-footer.php"); ?>



    </body>

</html>






