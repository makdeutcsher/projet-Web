<!DOCTYPE html>
<html>



<?php $id_categorie=$_GET['id_cat'];
include("../../controller/afficher-commentaire.php");

?>



<body>

</br></br>
<div class="f">
<form action="../../controller/commenter.php" method="post" id="usrform" align="center">
  Name: <input type="text" name="user_name">
  <input type="submit">
  
</br></br>
<input type="hidden" name="id_cat" value="<?=$id_categorie;?>" />

<textarea rows="4" cols="50" name="description" form="usrform">
Ecrire un commentaire ici...</textarea>
</form>
</div>




<style>
    f form {
   background:#242d3a;
  
  color:#fff;
  
  padding:15px;
  -ms-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translate(-50%,-50%);
  transform: translate(-50%,-50%);
    }

    </style>
</br></br></br></br>





<h3 align="center" style="color:#338fda;"><b>Liste des commentaires triés par dateTime</b></h3>


<table id ="commentaire-table" border="1px" align="center" >
    <thead>
    <tr>
    <th scope="col" >Utilisateur</th>    
    <th scope="col">Description</th>
    <th scope="col">Date</th>
    

    </tr>
    </thead>
    <tbody id="commentaire-tab-index">
    
    
    <?php

// var_dump($cs);

    foreach ($cs as $cs) : ?>
    <tr>
        
        <td id=<?= $cs->id ?>><?= $cs->user_name ?></td>
        <td id=<?= $cs->id ?>><?= $cs->description ?></td>
        <td id=<?= $cs->id ?>><?= $cs->date ?></td>
       
        </tr>
    <?php endforeach; ?>


    </tbody>
   
    </table>











</body>
</html>
