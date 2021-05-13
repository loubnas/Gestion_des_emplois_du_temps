<?php 
require_once 'connexion.php';

class Matiere {
   private $id;
   private $nom;
//    private $con;
   
  
    // INSERTION matiere :
    public function create($nom){
        $con=new Connexion();
        $conn2=$con->con;
        $this->nom=$nom;
        
        
        $query="INSERT INTO matiere(LibelleM) VALUES ('".$this->nom."')";
        $result = $conn2->prepare($query);
       
        $result->execute();
        
        
   }

   //AFFICHAGE matiere :
    function read(){
        $con=new Connexion();
        $conn2=$con->con;

        $query="SELECT * FROM `matiere`";
        $result = $conn2->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


     //Delete matiere :
     function delete($id){
       $this->id=$id;
       $con=new Connexion();
       $conn2=$con->con;

        $query="DELETE FROM matiere WHERE IdM=".$this->id;
        $result = $conn2->prepare($query);
        $result->execute();
    }


    //UPDATE matiere :
    public function saveup($id,$nom){
        $con=new Connexion();
        $conn2=$con->con;
        $this->id=$id;
        $this->nom=$nom;

        $query="UPDATE `matiere` SET `LibelleM`='".$this->nom."' WHERE IdM=".$this->id;
        $result = $conn2->prepare($query);
        $result->execute();
    }


    
   
     // select for matiere :

        public function selectMatiere($id){
            $con=new Connexion();
            $conn2=$con->con;
            
            $query="SELECT * FROM matiere where IdM=$id";
            $result = $conn2->prepare($query);
            $result->execute();
            return $result->fetchAll(PDO::FETCH_ASSOC);
    }

 
   
}
?>