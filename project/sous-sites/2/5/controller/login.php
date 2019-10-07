<?php
 include("../config/connection.php");

   $user = $_POST['uname'];
   $pass = md5($_POST['psw']);
   
//  if (!isset($_SESSION))
  $query = "SELECT * FROM users where user_name= '". $user ."' and password= '". $pass ."'";
  // echo $query;
  $data = $conn->query($query)->fetchAll();
   // echo count($data);
  // var_dump($data);

   if ( count($data) > 0){
       session_start();
       foreach($data as $row){
       $_SESSION ['user'] = $user;
       $_SESSION['password'] = $pass;
       $_SESSION['admin'] = $row['admin'];
      
       
       //echo "l'utilisateur ".$_SESSION['user']." est connectee ";
       }
    } else{
        echo "utilisateur ou mot de pass incorrect ";
    }
    header('location: ../index.php');
?>