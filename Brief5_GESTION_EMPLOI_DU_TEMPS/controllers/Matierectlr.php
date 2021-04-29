<?php 
require_once __DIR__."/../models/Matiere.php";

class Matierectlr{

function index() {
  if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin']))
  {
    header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/matiere/read');
  }else{
    header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
 }  
}


//instantiation 'create matiere'
function create(){
  if(isset( $_SESSION['admin']))
  {
    if(isset($_POST['add'])){
     $matiere=new Matiere();
     $nom=$_POST['nom'];
     $matiere->create($nom);
     $i=0;
        while(isset($_POST['nom'.$i])){
          $matiere->create($_POST['nom'.$i]);
          $i++;
    }
    header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/matiere/read');
  }
    
}
  else{
      header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
    
    }
}
 
//instantiation 'affichage matiere'
function read(){
  if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin']))
  {
    $matiere=new Matiere();
    $matieres=$matiere->read();
    require_once __DIR__."/../views/matiere.php";

  }else{
  header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
}
}


//instantiation 'delete matiere'
function delete(){
  if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
 
  if(isset($_POST['delete'])){
    $matiere=new Matiere();
    $id=$_POST['del'];
    $matiere->delete($id);
  }
     header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/matiere/read');
  }
  else{
     header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
  }
}



//instantiation 'update salle'
function update(){
  if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
    if(isset($_POST['update'])){
       $id=$_POST['up'];
       $matiere=new Matiere();
       $ml=$matiere->selectMatiere($id);
    require_once __DIR__."/../views/Managematiere.php";
 }
 else{
  header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/matiere/read');
  }
}
else{
  header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
  }
}

public function saveupdate(){
 if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){

  if(isset($_POST['save'])){
     $id=$_POST['idupdate'];
     $libelle=$_POST['libelle'];
     $matiere=new Matiere();
     $matiere->saveup($id,$libelle);
    }
    header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/matiere/read');
    }
  else{
  header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
}
 
}

}

?>