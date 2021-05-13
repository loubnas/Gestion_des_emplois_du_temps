<?php
require_once __DIR__."/../models/User.php";
require_once __DIR__."/../models/Enseignant.php";

class Loginctlr
{
    function index(){
        
        require_once __DIR__."/../views/login.php";
    }

function auth()
{
    if (isset($_POST['login'])){
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user=new User();
        $result = $user->read($email,$password);
        $enseignant = new Enseignant();
        $result1=$enseignant->readEnseg($email,$password);
      

    if(!empty($result)){            
            
        $_SESSION['admin']=$result;
        header("location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/salle");

        
    }elseif(!empty($result1)){

            $_SESSION['enseignant']=$result1;
            header("location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/enseignant");
    }else {
      
            $_SESSION['erreurLogin']="<strong>Erreur!</strong> Login ou mot de passe incorrecte !"; 
            header("location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login"); 
        }
    }
}

       

    
    public function deconnect(){
        session_start();
        session_unset();
        session_destroy();
        
        header("location: http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login");
    }



}



?>