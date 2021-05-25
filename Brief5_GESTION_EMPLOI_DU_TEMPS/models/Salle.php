<?php 
require_once 'connexion.php';

class Salle {
    private $id;
    private $libelle;
    private $capacite;
   
    // INSERTION Salle :
    public function create($libelle,$capacite){
        $con=new Connexion(); //istantiation de l'objet $con
        $conn2=$con->con;    //On appel l'attribut con et on recupere sa valeur dans $conn2
        $this->libelle=$libelle;
        $this->capacite=$capacite;
        $query=("INSERT INTO `salle`(`LibelleS`, `CapasiterS`) VALUES ('".$this->libelle."',".$this->capacite.")");
        $result = $conn2->prepare($query);
        $result->execute();
    }

     //AFFICHAGE salle :
     public function read(){
        $con=new Connexion();
        $conn2=$con->con; 
        $query="SELECT * FROM salle";
        $result = $conn2->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


    //Delete salle :
    public function delete($id){
        $con=new Connexion();
        $conn2=$con->con;   
        $this->id=$id;
        $query="DELETE FROM salle WHERE IdS=".$this->id;
        $result = $conn2->prepare($query);
        $result->execute();
    }


    //UPDATE salle :
    public function saveup($id,$libelle,$capacite){
        $con=new Connexion();
        $conn2=$con->con;    
        $this->id=$id;
        $this->libelle=$libelle;
        $this->capacite=$capacite;
        $query="UPDATE `salle` SET LibelleS='$this->libelle', CapasiterS='$this->capacite' WHERE IdS=$this->id";
        $result = $conn2->prepare($query);
        $result->execute();
    }
   

     // select for salle :

        public function selectSalle($id){
            $con=new Connexion();
            $conn2=$con->con;     
            $query="SELECT * FROM salle where IdS=$id";
            $result = $conn2->prepare($query);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
    }


      
}
?>



