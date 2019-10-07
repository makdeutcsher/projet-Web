<?php

class Utilisateur
{
    public $id;
    public $user_name;
    public $password;
    public $admin;


    private $db_conn;

    function setConnection($conn)
    {
        $this->db_conn = $conn;
    }

    function __construct()
    {
    }


    function init( $id,$uname,$admin)
    {
        $this->id = $id;
        $this->user_name = $uname;
        $this->admin = $admin;
        

    }

    public function save($user_name,$psw,$acc)
    {

        $sql = "INSERT INTO users (user_name,password,admin) VALUES ('$user_name','$psw','$acc')";

        $this->db_conn->query($sql);

    }

    public function get($user_name,$pass)
    {

        $sql = "SELECT * FROM users where user_name= '" . $user_name . "' and password= '" . $pass . "'";
  // echo $query;
       
        $data = $this->db_conn->query($sql)->fetchAll();
        // //var_dump($data);
        // $list_f = [];
        // foreach ($data as $d) {
            
        // //var_dump($formation);
        //     $f = new self();
        //     $f->init($d['uname'], $d['nom']);
        //     array_push($list_f, $f);
        // }
        // return $list_f;


        return $data;

    }
    public function getAll()
    {

        $sql = "SELECT * FROM users ";
  // echo $query;
       
        $data = $this->db_conn->query($sql)->fetchAll();
        //var_dump($data);
        $list_f = [];
        foreach ($data as $d) {
            
        //var_dump($formation);
            $f = new self();
            $f->init($d['ID'],$d['user_name'], $d['admin']);
            array_push($list_f, $f);
        }
        return $list_f;


       

    }


    public function update($id,$nom, $acc)
    {

        $sql = "UPDATE users SET user_name='".$nom."', admin='".$acc."' WHERE id =".$id;

        $this->db_conn->query($sql);

    }




}
?>
