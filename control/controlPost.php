<?php 

require_once('model/allManager.php');



if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'accueil';
}
$action = $_REQUEST['action'];
switch($action){

    #region affichage d'un post
    case 'afficherPost':
    {
        $postMananger = new PostManager();
        $typeManager = new TypeManager;
        $billet = $postMananger->getBillet($_GET['id']);
        $types = $typeManager->getTypeInformations();
        require 'view/vueAffichagePost.php';
        break;
    }
    #endregion

    #region accueil
    case 'accueil':
    {
        $typeManager = new TypeManager;
        $postMananger = new PostManager();
        $types = $typeManager->getTypeInformations();
        require('view/vueAccueilPost.php');
        break;
    }
    #endregion

    #region ajoutPost
    case 'ajoutPost':
        {
            $uneImage = 'NULL';
            
            if (isset($_FILES['image']) && !empty($_FILES['image']['name']))
            {
                $extensions = array('png', 'gif','jpg','jpeg');
                $extensions_fichier = strtolower(substr(strrchr($_FILES['image']['name'],'.'),1));
    
    
                if(!in_array($extensions_fichier,$extensions)){
                    $erreur = "Vous devez transferer un fichier de type PNG, JPG ou JPEG";
                }
    
                $fichier = basename($_FILES['image']['name']);
                $taille_max = 1048576;
                $taille = filesize($_FILES['image']['tmp_name']);
                if($taille > $taille_max)
                {
                    $erreur = 'Le fichier est trop volumineux..., la limite est de 1Mo';
                }
    
    
                $dossier = 'public/img/';
                if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
                {
                    //On formate le nom du fichier ici...
                    $fichier = strtr($fichier,
                    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                    //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                    if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier))
                    {
                        echo 'Upload effectué avec succès !';
                        $uneImage = $fichier;
                    }
                    else //Sinon (la fonction renvoie FALSE).
                    {
                        echo 'Echec de l\'upload !';

                    }
                    
                }
                else{
                    echo $erreur;
                }
            }
                


            $unTitre = $_POST['unTitre'];
            $unContenu = $_POST['unContenu'];
            $unLien = $_POST['unLien'];
            $unType = explode("-",$_POST['unType']); 
           
            $postMananger = new PostManager();

            if ($uneImage == 'NULL')
            {
                $postMananger->addBilletsansImage($unTitre, $unContenu, $unLien, $unType[1], $_SESSION['id']);
            }else{
                $postMananger->addBilletavecImage($unTitre, $unContenu, $unLien, $unType[1], $uneImage, $_SESSION['id']);
            }
            

            if (isset($_SESSION['pseudo'])){
                $postMananger = new PostManager();
                $typeManager = new TypeManager;
                $types = $typeManager->getTypeInformations();
                require('view/vueAccueilPost.php');
                break;
            }
            else{
                require 'view/vueErreur.php';
                break;
            }

        }
    #endregion

    #region modificationPost
        case 'preModificationPost':
        {
            $postMananger = new PostManager();
            $typeManager = new TypeManager;
            $billet = $postMananger->getBillet($_GET['id']);
            $types = $typeManager->getTypeInformations();
            require 'view/vueModificationBillet.php';
            break;
            
        }

        case'modificationPost':
        {
            $uneImage = 'NULL';
            
            if (isset($_FILES['image']) && !empty($_FILES['image']['name']))
            {
                $extensions = array('png', 'gif','jpg','jpeg');
                $extensions_fichier = strtolower(substr(strrchr($_FILES['image']['name'],'.'),1));
    
    
                if(!in_array($extensions_fichier,$extensions)){
                    $erreur = "Vous devez transferer un fichier de type PNG, JPG ou JPEG";
                }
    
                $fichier = basename($_FILES['image']['name']);
                $taille_max = 10485700000000000000000000000006;
                $taille = filesize($_FILES['image']['tmp_name']);
                if($taille > $taille_max)
                {
                    $erreur = 'Le fichier est trop volumineux..., la limite est de 1Mo';
                }
    
    
                $dossier = 'public/img/';
                if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
                {
                    //On formate le nom du fichier ici...
                    $fichier = strtr($fichier,
                    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                    //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                    if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier))
                    {
                        //echo 'Upload effectué avec succès !';
                        $uneImage = $fichier;
                    }
                    else //Sinon (la fonction renvoie FALSE).
                    {
                        echo 'Echec de l\'upload !';
                        
                    }
                }
                else{
                    echo $erreur;
                }
            }

            $idBillet = $_POST['idPost'];
            $unTitre = $_POST['titrePost'];
            $unContenu = $_POST['contenuPost'];
            $unLien = $_POST['unLien'];
            $unType = explode("-",$_POST['unType']); 
           

            $postMananger = new PostManager();
            
            if ($uneImage == 'NULL')
            {
                $postMananger->updateBilletsansImage($idBillet, $unTitre, $unContenu, $unLien, $unType[1], $_SESSION['id']);
            }else{
                $postMananger->updateBilletavecImage($idBillet, $unTitre, $unContenu, $unLien, $unType[1], $uneImage, $_SESSION['id']);
            }
            
            
            if (isset($_SESSION['pseudo'])){
                $postMananger = new PostManager();
                $typeManager = new TypeManager;
                $billet = $postMananger->getBillet($idBillet);
                $types = $typeManager->getTypeInformations();
                require 'view/vueAffichagePost.php';
                break;
            }
            else{
                require 'view/vueErreur.php';
                break;
            }
        }
    #endregion

    #region suppressionPost
    case 'suppressionPost':
        {
            $idBillet = $_GET['id'];
            $postMananger = new PostManager();
            $postMananger->deleteBillet($idBillet);
            
            if (isset($_SESSION['pseudo'])){
                $postMananger = new PostManager();
                $typeManager = new TypeManager;
                $posts = $postMananger->getBillets();
                $types = $typeManager->getTypeInformations();
                require 'view/vueAccueil.php';
                break;
            }
            else{
                require 'view/vueErreur.php';
                break;
            }
        }
    #endregion
}


