<?php
require_once("model/Manager.php"); 

class UserManager extends Manager
{
    
    //renvoie le nom / prenom de l utilisateur
    public function getPseudo()
    {
        return $_SESSION['nom'] . " " . $_SESSION['prenom'];
    }

    //demande de tous les mots de passe
    public function getPasswords()
    {
        // Connexion a la bd
        $bdd = $this->getBdd();

        $req = $bdd -> prepare("SELECT * FROM utilisateurs");
        $req->execute();
        $res = $req -> fetch();
        return $res;
    }

    //Ajout d'un compte utilisateur
    public function addUser($motdepasse, $nom, $prenom, $mail )
    {
        $bdd = $this->getBdd();

        $req = $bdd->prepare("INSERT INTO utilisateurs (nom, prenom, mail, motdepasse) VALUES ( :lenom,:leprenom,:lemail,:lepass)");
        $req->bindParam(':lenom', $nom);
        $req->bindParam(':leprenom', $prenom);
        $req->bindParam(':lemail', $mail);
        $req->bindParam(':lepass', $motdepasse);
        $req->execute();
        
    }

}
