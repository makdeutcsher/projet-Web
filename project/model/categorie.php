<?php



class Categorie
{
    public $id;
    public $nom;
    public $db_conn;

    function setConnection($conn)
    {
        $this->db_conn = $conn;
    }

    function __construct()
    {
    }



    protected function init($id, $nom)
    {
        $this->id = $id;
        $this->nom = $nom;
        

    }

    public function save($nom)
    {

        $sql = "INSERT INTO categorie (nom) VALUES ('$nom')";

        $this->db_conn->query($sql);

    }
    public function get()
    {

        $sql = "SELECT * FROM categorie ";
        $categories = $this->db_conn->query($sql)->fetchAll();
        //var_dump($formations);
        // $list_f = [];
        // foreach ($categories as $categorie) {
            
        // //var_dump($formation);
        //     $f = new self();
        //     $f->init($categorie['id_categorie'], $categorie['nom']);
        //    array_push ($list_f,$f);
        // }
         return $categories;

    }


    public function update($id,$nom)
    {

        $sql = "UPDATE categorie SET nom='".$nom."' WHERE id =".$id;

        $this->db_conn->query($sql);

    }









}


?>
