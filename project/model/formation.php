<?php



class Formation
{
    public $id;
    public $nom;
    public $domain;
    public $wilaya;
    public $commune;
    public $adresse;
    public $tel;
    public $fax;
    public $id_catégorie;
    public $actif;
    public $db_conn;

    function setConnection($conn)
    {
        $this->db_conn = $conn;
    }

    function __construct()
    {
    }



    protected function init($id, $nom, $domaine, $wilaya, $commune, $adresse, $tel, $fax, $id_categorie,$actif)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->domaine = $domaine;
        $this->wilaya = $wilaya;
        $this->commune = $commune;
        $this->adresse = $adresse;
        $this->tel = $tel;
        $this->fax = $fax;
        $this->id_categorie = $id_categorie;
        $this->actif = $actif;

    }

    public function save($nom, $domaine, $wilaya, $commune, $adresse, $tel, $fax, $id_categorie)
    {

        $sql = "INSERT INTO formation (nom, domaine,wilaya,commune,adresse,tel,fax,id_categorie,actif) VALUES ('$nom','$domaine', '$wilaya','$commune','$adresse','$tel' ,'$fax','$id_categorie',1)";

        $this->db_conn->query($sql);

    }
    public function get($id)
    {

        $sql = "SELECT * FROM formation where id_categorie=".$id.";";
        $formations = $this->db_conn->query($sql)->fetchAll();
        //var_dump($formations);
        $list_f = [];
        foreach ($formations as $formation) {
            
        //var_dump($formation);
            $f = new self();
            $f->init($formation['id'], $formation['nom'], $formation['domaine'], $formation['wilaya'], $formation['commune'], $formation['adresse'], $formation['tel'], $formation['fax'], $formation['id_categorie'],$formation['actif']);
           array_push ($list_f,$f);
        }
        return $list_f;

    }


    public function update($id,$nom, $domaine,$wilaya,$commune,$adresse,$tel,$fax,$id_categorie)
    {

        $sql = "UPDATE formation SET nom='".$nom."', domaine='".$domaine."',wilaya='".$wilaya."',commune='".$commune."',adresse='".$adresse."',tel='".$tel."',fax='".$fax."',id_categorie='".$id_categorie."' WHERE id =".$id;

        $this->db_conn->query($sql);

    }


    public function mettreLigne($id,$actif)
    {

        $sql = "UPDATE formation SET actif='".$actif."' WHERE id =".$id;

        $this->db_conn->query($sql);

    }





}


?>
