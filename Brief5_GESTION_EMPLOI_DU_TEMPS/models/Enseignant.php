<?php
require_once 'connexion.php';
class Enseignant
{
    private $id;
    private $name;
    private $prenom;
    private $email;
    private $password;
    private $matiere;
  
   
     // INSERTION enseignant :
public function createEnseg($nom,$prenom,$email,$password,$matiere){
       $con=new Connexion();
       $conn2=$con->con; //On appel l'attribut con et on recupere sa valeur dans $conn2
       $this->name=$nom;
       $this->prenom=$prenom;
       $this->email=$email;
       $this->password=password_hash($password,PASSWORD_DEFAULT); //pour hasher masquer le mode passe 
       $this->matiere=$matiere;
       
$query=("INSERT INTO enseignant(`NomE`, `PrenomE`, `EmailE`, `PasswordE`, `IdM`) VALUES ('".$this->name."','".$this->prenom."','".$this->email."','".$this->password."','".$this->matiere."')");
$result = $conn2->prepare($query);
$result->execute();
}


 // SELECT enseignant :
public function readEnseg($email){
    $con=new Connexion();
    $conn2=$con->con;
    $this->email=$email;
    $query=("SELECT * FROM `enseignant` WHERE EmailE='".$this->email."' ");
    $result = $conn2->prepare($query);
    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);

}
// Salle disponible :
function salleDisponible($salle,$date,$dure){
    $con=new Connexion();
    $conn2=$con->con; 
    $query="SELECT cour.IdC FROM salle,cour WHERE salle.IdS=cour.IdS AND salle.IdS=".$salle." AND DateC='".$date."' AND DureC='".$dure."'";
    $result = $conn2->prepare($query);
    $result->execute();
    return $result->rowCount();
    
}

// Groupe disponible :
function groupeDisponible($groupe,$date,$dure){
    $con=new Connexion();
    $conn2=$con->con; 
    $query="SELECT cour.IdC FROM groupe,cour WHERE groupe.IdG=cour.IdG AND groupe.IdG=".$groupe." AND DateC='".$date."' AND DureC='".$dure."'";
    $result = $conn2->prepare($query);
    $result->execute();  
    return $result->rowCount();
    
}

 
// Reservation :
 function reservation($idS,$idG,$idE,$dure,$date){
    $con=new Connexion();
    $conn2=$con->con;
    $query="INSERT INTO `cour`(`IdS`, `IdG`, `IdE`, `DateC`, `DureC`) VALUES (".$idS.",".$idG.",".$idE.",'".$date."','".$dure."')";
    $result = $conn2->prepare($query);
    $result->execute(); 
}

//remplissage tableau :
public function SelectCours($idE){
    $con=new Connexion();
    $conn2=$con->con; 
    $this->id=$idE;
    $query="SELECT cour.IdC,cour.DateC,cour.DureC,groupe.LibelleG,salle.LibelleS,salle.CapasiterS,groupe.effectifG FROM cour,groupe,salle,enseignant WHERE cour.IdS=salle.IdS AND cour.IdG=groupe.IdG AND cour.IdE=enseignant.IdE AND enseignant.IdE=".$this->id."";
    $result = $conn2->prepare($query);
    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC);
}


//Supprimer un cour :
function deleteCours($id){
    $this->id=$id;
    $con=new Connexion();
    $conn2=$con->con;
    $query="DELETE FROM cour WHERE IdC=".$this->id;
    $result = $conn2->prepare($query);
    $result->execute();
}

// ------------------------------------------UPDATE-----------


 
//UPDATE Resevation :
function UpdateReservation($idS,$idG,$idE,$date,$dure,$idC){
    $con=new Connexion();
    $conn2=$con->con; 
    $query=("UPDATE cour SET `IdS`=".$idS.",`IdG`=".$idG.",`IdE`=".$idE.",`DateC`='".$date."',`DureC`='".$dure."' WHERE IdC=".$idC);
    $result = $conn2->prepare($query);
    $result->execute();
}





}