<?php
require_once("model/Manager.php"); 

class typeManager extends Manager
{
    
    #region select
    //renvoie la liste des types
    public function getTypeInformations()
    {
        $bdd = $this->getBdd();
        $lesInfos=$bdd->query("SELECT * FROM typeinformation");
        return $lesInfos;
        
    }

    //renvoie un type
    public function getType($idType)
    {
        $bdd = $this->getBdd();
        $billet = $bdd->query("SELECT * FROM typeinformation WHERE id = $idType");
        if ($billet->rowCount() == 1)
            return $billet->fetch(); // accès à la première ligne de résultat
        else 
            throw new Exception("Aucun type ne correspond à l'identifiant $idType");
        return $billet;
    }
    #endregion

    #region insert to
    //ajout d'un billlet avec en paramètre le titre et le contenu du billet
    function addType($unLibelle)
    {    
        $unLibelle = htmlspecialchars($unLibelle);
        $bdd = $this->getBdd();
        $req = $bdd->prepare("INSERT INTO typeinformation (libelle) VALUES (:lelibelle);");
        $req->bindParam(':lelibelle', $unLibelle);
        $req->execute();
    }
    #endregion

    #region delete
    //suppression d'un post
    function deleteType($idBillet)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare("DELETE FROM typeinformation WHERE typeinformation.id =  $idBillet");
        $req->execute();
    }
    #endregion

    #region update
    //modification d'un post
    function updateType($idType, $unLibelle)
    {
        $unLibelle = htmlspecialchars($unLibelle);
        $bdd = $this->getBdd();
        $req = $bdd->prepare("UPDATE typeinformation SET libelle = :lelibelle WHERE typeinformation.id = :lidtype");
        $req->bindParam(':lelibelle', $unLibelle);
        $req->bindParam(':lidtype', $idType);
        $req->execute();
    }
    #endregion
   
}