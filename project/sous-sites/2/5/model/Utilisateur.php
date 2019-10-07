<?php

class Utilisateur
{
    private $user_name;
    private $password;
    private $admin;
    
    
    private $db_conn;

    function setConnection($conn){
        $this->db_conn = $conn;
    }

    function __construct($uname, $psw,$admin)
    {
        $this->user_name = $uname;
        $this->password = $psw;
        $this->admin = $admin;
        
    }

    public function save(){
        
        $sql = "INSERT INTO users (user_name,password,admin) VALUES ('$this->user_name','$this->psw','$this->admin')";
        
        $this->db_conn->query($sql);

    }
    
}
?>
