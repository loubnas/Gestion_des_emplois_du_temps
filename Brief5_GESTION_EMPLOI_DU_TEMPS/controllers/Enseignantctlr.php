<?php 
require_once __DIR__."/../models/Enseignant.php";
require_once __DIR__."/../models/Groupe.php";
require_once __DIR__."/../models/Salle.php";
require_once __DIR__."/../models/Matiere.php";

class Enseignantctlr{

function index($err=""){
    if(isset( $_SESSION['enseignant']) &&  !empty($_SESSION['enseignant'])){
      $idE=$_SESSION['enseignant'][0]['IdE'];
      $enseignant=new Enseignant();
      $cours=$enseignant->SelectCours($idE);
        
        $salle=new Salle();
        $result=$salle->read();
        $groupe=new Groupe();
        $result1=$groupe->read();

  require_once __DIR__."/../views/enseignant.php";
    }else{
        header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
    }
}


function inscription(){

    $matiere= new Matiere();
    $resultat = $matiere->read();
    require_once __DIR__."/../views/inscription.php";
}




//instantiation 'create enseignant'

function createEnseg(){

  if(isset($_POST['inscription'])){   
          $nom=$_POST['nom'];
          $prenom=$_POST['prenom'];
          $email=$_POST['email'];
          $password=$_POST['password'];
          $matiere=$_POST['matiere'];
          $enseignant = new Enseignant();

    $enseignant->createEnseg($nom,$prenom,$email,$password,$matiere);
    header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
  }else
  {
    header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
  }
}




// Reservation :
function reservation(){

if(isset($_POST['add']) ){
  $idS=$_POST['salle'];
  $idG=$_POST['groupe'];
  $dure=$_POST['dure'];
  $date=$_POST['date'];
  $jour=date('Y-m-d');
  $idE=$_SESSION['enseignant'][0]['IdE'];
  $capaciterS='';
  $effectifG='';


  if($date>=$jour){
      $salle=new Salle;
      foreach($salle->selectSalle($idS) as $SL){
           $capaciterS=$SL['CapasiterS'];
    }
     
          
      $groupe=new Groupe;
      foreach($groupe->selectGroupe($idG) as $GP){
          $effectifG=$GP['effectifG'];
    }
      
      $enseignant=new Enseignant;
      $result=$enseignant->salleDisponible($idS,$date,$dure);
      $result1 = $enseignant->groupeDisponible($idG,$date,$dure); 

  
if($result==0){
    if($result1==0){
        if($capaciterS >= $effectifG){
          
                $enseignant->reservation($idS,$idG,$idE,$dure,$date);
                header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/enseignant');
        }
        else{ 
                $this->index('<script>alert("La capacite de la salle est moins que l effectif du groupe !");</script>');
        }
        }
               
      else{
               $this->index('<script>alert("Le groupe n est pas disponible !");</script>');
      }
    }

  else{
          $this->index('<script>alert("La salle n est pas dispinible !");</script>');
  }
}

              
else{
        $this->index('<script>alert("Veuillez choisir une  date > ou = a la date de ce jour !");</script>');
}
}
else{
  header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/enseignant');
}

}


// supprimer un cours :
function deleteCours(){

  if(isset($_POST['delete'])){
        $enseignant = new Enseignant();
        $id=$_POST['del'];
        $enseignant->deleteCours($id);
        header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/enseignant');
  }
}





// //-------------------UPDATE RESEVATION :

function UpdateReservation(){
 
if(isset($_POST['enregistrer'])){
  $idS=$_POST['salle'];
  $idG=$_POST['groupe'];
  $dure=$_POST['dure'];
  $date=$_POST['date'];
  $idC=$_POST['cours'];
  $jour=date('Y-m-d');
  $idE=$_SESSION['enseignant'][0]['IdE'];
  $capaciterS='';
  $effectifG='';
    
  if($date>=$jour){
    
      $salle=new Salle;
      foreach($salle->selectSalle($idS) as $SL){
           $capaciterS=$SL['CapasiterS'];
    }
     
          
      $groupe=new Groupe;
      foreach($groupe->selectGroupe($idG) as $GP){
          $effectifG=$GP['effectifG'];
    }
      
      $enseignant=new Enseignant;
      $result=$enseignant->salleDisponible($idS,$date,$dure);
      $result1 = $enseignant->groupeDisponible($idG,$date,$dure); 
      
if($result==0){
  
    if($result1==0){
        if($capaciterS >= $effectifG){
          
          
                $enseignant-> UpdateReservation($idS,$idG,$idE,$date,$dure,$idC);
                header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/enseignant');
            
        }
        else{ 
                header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/enseignant');  
        }
        }
               
      else{
               header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/enseignant');
      }
    }

  else{
               header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/enseignant');
  }
}

              
else{
              header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/enseignant');
}
}
else{
  header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/enseignant');
}

}







}









 

    
    




