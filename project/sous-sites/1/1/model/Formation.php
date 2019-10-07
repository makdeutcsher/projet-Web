<?php

class Formation
{
    private $vh;
    private $prix;
    private $taxe;
    private $nom;
    private $type;
    
    private $db_conn;

    function setConnection($conn){
        $this->db_conn = $conn;
    }

    function __construct($vh, $prix,$taxe,$nom,$type)
    {
        $this->vh = $vh;
        $this->prix = $prix;
        $this->taxe = $taxe;
        $this->nom = $nom;
        $this->type = $type;
      
    }

    public function save(){
        
        $sql = "INSERT INTO formations (Volume_horaire,Prix,Taxe,Nom,ID,id_categorie,nom_ecole) VALUES ('$this->vh','$this->prix', '$this->taxe','$this->nom','$this->type',1,'finance_commerce' )";
        
        $this->db_conn->query($sql);

    }
    
}
?>
