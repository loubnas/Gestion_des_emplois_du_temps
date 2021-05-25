<?php 
require_once __DIR__."/../models/Salle.php";

class Sallectlr{

  function index() {
   
    if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin']))
  {
    $salle=new Salle();
    $salles=$salle->read();
    require_once __DIR__."/../views/salle.php";

  }else{
     header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
      }
  } 

//instantiation 'create salle'
function create(){
  if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin']))
  {
    
   if(isset($_POST['add'])){
    $salle=new Salle();
    $libelle=$_POST['libelle'];
    $capacite=$_POST['capacite'];
    $salle->create($libelle,$capacite);
    $i=0;
      while(isset($_POST['capacite'.$i])){
        $salle->create($_POST['libelle'.$i],$_POST['capacite'.$i]);
        $i++;
      }
   
    header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/salle');

  }
}

else{
  header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');

}

}



//instantiation 'delete salle'
function delete(){
    if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
       
      if(isset($_POST['delete'])){
        $salle=new Salle();
        $id=$_POST['del'];
        $salle->delete($id);
      }  
      header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/salle');       
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
      $salle=new Salle();
      $sl=$salle->selectSalle($id);
      require_once __DIR__."/../views/Managesalle.php";
    }
    else{
      header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/salle');
    }
  }
    else{
      header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
    }
  
}

//instantiation save update salle:
public function saveupdate(){
  if(isset( $_SESSION['admin']) &&  !empty($_SESSION['admin'])){
    
  if(isset($_POST['save'])){
    $id=$_POST['idupdate'];
    $libelle=$_POST['libelle'];
    $capacite=$_POST['capacite'];
    $salle=new Salle();
    $salle->saveup($id,$libelle,$capacite);
  }
  header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/salle');

}
  else{
  header('location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login');
  }
   
}

}
?>