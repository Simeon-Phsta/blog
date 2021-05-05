<?php
require_once("model/Manager.php"); 

class PostManager extends Manager
{
   
    
    #region select

    //Const pour éviter la redondance dans les requêtes select
    const debut = 'SELECT BIL_ID AS id, BIL_DATE AS date, BIL_TITRE AS titre,
    BIL_CONTENU AS contenu, BIL_LIEN AS lien, BIL_IMG AS img, typeinformation.libelle AS typeBillet,
    BIL_TYPE AS idTypeBillet
    FROM billet INNER JOIN typeinformation 
    ON typeinformation.id = billet.BIL_TYPE';

    const finDeLaRequete = ' ORDER BY id DESC';

    

    //renvoie la liste de tous les billets
    public function getBillets()
    {
        $bdd = $this->getBdd();
        $billets = $bdd->query( self::debut." 
        ".self::finDeLaRequete ); 
        return $billets;
    }

    //renvoie des billets en fonction de leur type
    public function getBilletsPrecis($idType)
    {
        $bdd = $this->getBdd();
        $billets = $bdd->query(self::debut." WHERE billet.BIL_TYPE = $idType ".self::finDeLaRequete);
        return $billets;
    }

    //renvoie un billet en fonction de son id
    public function getBillet($idBillet)
    {
        $bdd = $this->getBdd();
        $billet = $bdd->query(self::debut." WHERE BIL_ID = '$idBillet'");
        if ($billet->rowCount() == 1)
            return $billet->fetch(); // accès à la première ligne de résultat
        else 
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
        return $billet;
    }

    #endregion

    #region insert to
    //ajout d'un billlet avec en paramètre le titre, le contenu du billet, un lien ou non, le type du billet et une image ou non
    function addBilletavecImage($titreBillet, $unContenu, $unLien, $unType, $leImage, $unAuteur)
    {    
        $unId=uniqid();

        $bdd = $this->getBdd();

        date_default_timezone_set('Europe/Paris');
        $date = date (  'o-m-j H:i:s' );;


        $sql = "INSERT INTO billet (BIL_ID, BIL_DATE, BIL_TITRE, BIL_CONTENU, BIL_LIEN, BIL_IMG,BIL_TYPE, BIL_AUTEUR)
        VALUES ( :leid, :ladate, :letitre, :lebillet, :lelien, :leimage, :letype, :leauteur)";

        $req = $bdd->prepare($sql);
        $req->execute(array(
        'leid' => uniqid(),
        'ladate' => $date,
        'letitre' => htmlspecialchars($titreBillet, ENT_QUOTES),
        'lebillet' => htmlspecialchars($unContenu, ENT_QUOTES),        
        'lelien' => $unLien,
        'leimage' => $leImage,
        'letype' => $unType,
        'leauteur' => $unAuteur
    ));
    }

    function addBilletsansImage($titreBillet, $unContenu, $unLien, $unType, $unAuteur)
    {    
        $unId=uniqid();

        $bdd = $this->getBdd();

        date_default_timezone_set('Europe/Paris');
        $date = date (  'o-m-j H:i:s' );;

        $sql = "INSERT INTO billet (BIL_ID, BIL_DATE,BIL_TITRE,BIL_CONTENU,BIL_LIEN, BIL_TYPE, BIL_IMG, BIL_AUTEUR)
        VALUES ( :leid, :ladate, :letitre, :lebillet, :lelien, :letype, :limg, :leauteur)";

        $req = $bdd->prepare($sql);
        $req->execute(array(
        'leid' => $unId,
        'ladate' => $date,
        'letitre' => htmlspecialchars($titreBillet, ENT_QUOTES),
        'lebillet' => htmlspecialchars($unContenu, ENT_QUOTES),        
        'lelien' => $unLien,
        'letype' => $unType,
        'limg' => "",
        'leauteur' => $unAuteur
        ));
    }
    #endregion

    #region delete
    //suppression d'un post
    function deleteBillet($idBillet)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare("DELETE FROM billet WHERE billet.BIL_ID =  '$idBillet'");
        $req->execute();
    }
    #endregion

    #region update
    //modification d'un post avec image
    function updateBilletavecImage($idBillet, $unTitre, $unContenu, $unLien, $unType, $uneImage, $unAuteur)
    {
        $bdd = $this->getBdd();

        $sql = "UPDATE billet SET BIL_TITRE = :letitre, BIL_CONTENU = :lebillet, BIL_LIEN = :lelien , BIL_IMG = :limage, BIL_TYPE = :letype, BIL_AUTEUR = :leauteur WHERE billet.BIL_ID = :leid";

        $req = $bdd->prepare($sql);
        $req->execute(array(
        'letitre' => htmlspecialchars($unTitre, ENT_QUOTES),
        'lebillet' => htmlspecialchars($unContenu, ENT_QUOTES),        
        'lelien' => $unLien,
        'limage' => htmlspecialchars($uneImage),
        'letype' => $unType,
        'leid' => $idBillet,
        'leauteur' => $unAuteur
    ));
    }

    //modification d'un post sans image
    function updateBilletsansImage($idBillet, $titreBillet, $unContenu, $unLien, $unType, $unAuteur)
    {
        $bdd = $this->getBdd();

        $sql = "UPDATE billet SET BIL_TITRE = :letitre, BIL_CONTENU = :lebillet,
         BIL_LIEN = :lelien , BIL_TYPE = :letype, BIL_AUTEUR = :lauteur 
         WHERE billet.BIL_ID = :leid";

        $bdd = $this->getBdd();

        $req = $bdd->prepare($sql);
        $req->execute(array(
        'letitre' => htmlspecialchars($titreBillet, ENT_QUOTES),
        'lebillet' => htmlspecialchars($unContenu, ENT_QUOTES),        
        'lelien' => $unLien,
        'letype' => $unType,
        'leid' => $idBillet,
        'lauteur' => $unAuteur
    ));
 
        
    }
    #endregion
   
}