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
        $result = $user->read($email);
        $enseignant = new Enseignant();
        $result1=$enseignant->readEnseg($email);
      
     //admin:
    if(!empty($result)){   
        $psadmin=$result[0]['password'];
        if(password_verify($password,$psadmin)){
        $_SESSION['admin']=$result;
        header("location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/salle");
        }
        else{
            $_SESSION['erreurLogin']="<strong>Erreur!</strong> mot de passe incorrecte !"; 
            header("location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login");    
        }

        
    }
    
    //enseignant :
    elseif(!empty($result1)){
        $ps=$result1[0]['PasswordE'];
        if(password_verify($password,$ps)){
      
            $_SESSION['enseignant']=$result1;
            header("location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/enseignant");
    }
    else{
        $_SESSION['erreurLogin']="<strong>Erreur!</strong> mot de passe incorrecte !"; 
        header("location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login");    
    }
}
else {
      
            $_SESSION['erreurLogin']="<strong>Erreur!</strong> Login incorrecte !"; 
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