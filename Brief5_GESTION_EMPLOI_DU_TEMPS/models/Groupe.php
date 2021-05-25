<?php
require_once 'connexion.php';

class Groupe {
   private $id;
   private $nom;
   private $effectif;
   
    // INSERTION groupe :
   public function create($nom,$effectif){
        $con=new Connexion();
        $conn2=$con->con;  //On appel l'attribut con et on recupere sa valeur dans $conn2
        $this->nom=$nom;
        $this->effectif=$effectif;
        $query="INSERT INTO `groupe`(`LibelleG`, `effectifG`) VALUES ('".$this->nom."',".$this->effectif.")";
        $result = $conn2->prepare($query);
        $result->execute();
   }

    //AFFICHAGE groupe :
   public function read(){
    $con=new Connexion();
    $conn2=$con->con;  
    $query="SELECT * FROM `groupe`";
    $result = $conn2->prepare($query);
    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);
}


 //Delete groupe :
 public function delete($id){
        $this->id=$id;
        $con=new Connexion();
        $conn2=$con->con;
        $query="DELETE FROM groupe WHERE IdG=".$this->id;
        $result = $conn2->prepare($query);
        $result->execute();
    }

    

//UPDATE groupe :
public function saveup($id,$nom,$effectif){
    $con=new Connexion();
    $conn2=$con->con; 
    $this->id=$id;
    $this->nom=$nom;
    $this->effectif=$effectif;
    $query="UPDATE `groupe` SET `LibelleG`='".$this->nom."',`effectifG`=".$this->effectif." WHERE IdG=".$this->id;
    $result = $conn2->prepare($query);
    $result->execute();
}


 // select for groupe:

    public function selectGroupe($id){
        $con=new Connexion();
        $conn2=$con->con;
        $query="SELECT * FROM groupe where IdG=$id";
        $result = $conn2->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
}

}





?>