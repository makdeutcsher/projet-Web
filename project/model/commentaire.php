<?php

class Commentaire
{
    public $id;
    public $user_name;
    public $description;
    public $id_categorie;
    public $date;


    public $db_conn;

    function setConnection($conn)
    {
        $this->db_conn = $conn;
    }


    function __construct()
    {
    }



    function init($id,$user_name, $description,$id_categorie,$date)
    {

        $this->id = $id;
        $this->user_name = $user_name;
        $this->description = $description;
        $this->id_categorie = $id_categorie;
        $this->date = $date;


    }

    public function save($user_name, $description,$id_categorie,$date)
    {

        
        $sql = "INSERT INTO commentaire (user_name,description,id_categorie,date) VALUES ('$user_name','$description','$id_categorie','$date')";
        
       

        $this->db_conn->query($sql);


        header('location: ../index.php');
    }

    public function get($id_categorie)
    {

        $sql = "SELECT * FROM commentaire where id_categorie= '" . $id_categorie . "' ORDER BY date desc ";

       
        $data = $this->db_conn->query($sql)->fetchAll();

        // var_dump($data);

        $list_f = [];
        foreach ($data as $c) {
        
            $f = new self();
            $f->init($c['id'],$c['user_name'], $c['description'],$c['id_categorie'],$c['date']);
            array_push($list_f, $f);
        }
        return $list_f;

    }





}
?>
