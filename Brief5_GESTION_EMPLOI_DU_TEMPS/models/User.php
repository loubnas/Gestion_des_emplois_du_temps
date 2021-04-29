<?php
require_once 'connexion.php';
class User
{
    private $id;
    private $name;
    private $prenom;
    private $email;
    private $password;
    private $query;

   //SELECT user :
    function read($email,$password){
        $con=new Connexion();
        $conn2=$con->con;
        $this->email=$email;
        $this->password=$password;
        
        $query=("SELECT * FROM `utilisateur` WHERE EmailUser='".$this->email."' AND password='".$this->password."'");
        
        $result = $conn2->prepare($query);
        
        $result->execute();
        $r= $result->fetchAll(PDO::FETCH_ASSOC);
        return $r;

    }
} 

?>