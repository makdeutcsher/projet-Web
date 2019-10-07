<?php
 
 include("../core/connection2.php");
 include("../model/Utilisateur.php");

 

 $user = $_POST['uname'];
 $pass = md5($_POST['psw']);

 $utilisateur=new Utilisateur($user,$pass);
 $utilisateur->setConnection($conn);
 $d=$utilisateur->get($user,$pass);

// var_dump($d);
   if ( count($d) > 0){
       session_start();
       foreach($d as $row){
       $_SESSION ['user'] = $user;
       $_SESSION['password'] = $pass;
       $_SESSION['admin'] = $row['admin'];
      
       
       //echo "l'utilisateur ".$_SESSION['user']." est connectee ";
       }
       header('location: ../index.php');
    } else{
        echo "utilisateur ou mot de pass incorrect ";
    }
  
?>