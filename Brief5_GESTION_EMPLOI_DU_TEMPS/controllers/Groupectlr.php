<?php 
require_once __DIR__."/../models/Groupe.php";

class Groupectlr{
    function index() {
      if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin']))
      {
        header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/groupe/read');

      }else{
      header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
       }
    } 

//instantiation 'create groupe'
function create(){
  if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin']))
  {
   if(isset($_POST['add']) ){
    $groupe=new Groupe();
    $nom=$_POST['nom'];
    $effectif=$_POST['effectif'];
    $groupe->create($nom,$effectif);

    $i=0;
      while(isset($_POST['nom'.$i])){
        $groupe->create($_POST['nom'.$i],$_POST['effectif'.$i]);
        $i++;
      }
  
    header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/groupe/read');
  }
}
 else{
  header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');

 }
}

//instantiation 'affichage groupe'
function read(){
  if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin']))
  {
  $groupe=new Groupe();
  $groupes=$groupe->read();
  require_once __DIR__."/../views/groupe.php";
}else{
  header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
}
}


//instantiation 'delete groupe'
function delete(){
  if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
  
  if(isset($_POST['delete'])){
    $groupe=new Groupe();
    $id=$_POST['del'];
    $groupe->delete($id);
  }
  header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/groupe/read');
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
     $groupe=new Groupe();
     $gl=$groupe->selectGroupe($id);
  require_once __DIR__."/../views/Managegroupe.php";
}
else{
  header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/groupe/read');
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
   $effectif=$_POST['effectif'];
   $groupe=new Groupe();
   $groupe->saveup($id,$libelle,$effectif);
 }
header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/groupe/read');
}
else{
  header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
}
 
}

}


    ?>