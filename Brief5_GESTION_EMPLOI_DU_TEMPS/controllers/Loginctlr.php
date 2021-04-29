<?php
require_once __DIR__."/../models/User.php";
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
        session_start();
        if(!empty($result)){            
            
                $_SESSION['admin']=$result;
                
            header("location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/salle/read");
        }else
        {
            $_SESSION['erreur']="les informations incorrect";
            header("location:http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login"); 


            
        }
      }  
    }
    public function deconnect()
    {
        session_start();
        session_unset();
        session_destroy();
        
        header("location: http://localhost/Brief5_GESTION_EMPLOI_DU_TEMPS/login");

    }
}

?>