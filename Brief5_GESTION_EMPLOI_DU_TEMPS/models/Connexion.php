<?php
class Connexion{
    private $host="localhost";
    private $database="gestiondeemploidutemps";
    private $user="root";
    private $password="";
    public $con;
   

    public function __construct(){
        try {
            $this->con=new PDO("mysql:host=".$this->host.";dbname=".$this->database,$this->user,$this->password);
            
        } catch (PDOException $e) {
            print "ERREUR : ".$e->getMessage()."<br/>";
        }   
    }
   
}
?>