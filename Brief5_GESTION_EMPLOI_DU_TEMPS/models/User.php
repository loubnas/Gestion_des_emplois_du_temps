<?php
require_once 'connexion.php';
class User
{
    private $email;
    private $password;

   //SELECT Admin  :
    function read($email){
        $con=new Connexion();
        $conn2=$con->con; //On appel l'attribut con et on recupere sa valeur dans $conn2
        $this->email=$email;
        
        $query=("SELECT * FROM `utilisateur` WHERE EmailUser='".$this->email."'");
        $result = $conn2->prepare($query);
        $result->execute();
        $r= $result->fetchAll(PDO::FETCH_ASSOC);
        return $r;

    }
} 

?>