<?php 

require_once('model/allManager.php');

if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'accueil';
}
$action = $_REQUEST['action'];
switch($action){

    #region accueil
        // affiche la liste de tous les billets du blog
        case 'accueil':
        {
            $typeManager = new TypeManager;
            $postMananger = new PostManager();
            $posts = $postMananger->getBillets();
            $types = $typeManager->getTypeInformations();
            require 'view/vueAccueil.php';
            break;
        }
    #endregion

    #region connexion
    
        case 'preconnexion':
        {
            $typeManager = new TypeManager;
            $postMananger = new PostManager();
            $posts = $postMananger->getBillets();
            $types = $typeManager->getTypeInformations();
            require 'view/vueConnexion.php';
            break;
        }

        case 'connexion':
        {
            if(isset($_POST['motdepasse']) && ($_POST['motdepasse']!="") && (isset($_POST['pseudo'])) && (($_POST['pseudo']) != "") ){

                $motdepasse =  $_POST['motdepasse'];
                $pseudo = $_POST['pseudo'];
                $userManager = new UserManager();
            
                $identifiantsBdd = $userManager->getPasswords();

                if($motdepasse == $identifiantsBdd[3] && $pseudo == $identifiantsBdd[1])
                {
                //session_start();
                    $_SESSION['pseudo']= $userManager->getPasswords()[1];
                    $_SESSION['id'] = $userManager->getPasswords()[0];
                    $_SESSION['role'] = $userManager->getPasswords()[4];
                    
                    $typeManager = new TypeManager;
                    $postMananger = new PostManager();
                    $posts = $postMananger->getBillets();
                    $types = $typeManager->getTypeInformations();
                    require 'view/vueAccueil.php';
                    break;
                }
                else{
                    $typeManager = new TypeManager;
                    $types = $typeManager->getTypeInformations();
                    $msgErreur =  "Mot de passe incorrect";
                    require 'view/vueErreur.php';
                    break;
                }
            }
            else
            {
                $typeManager = new TypeManager;
                $types = $typeManager->getTypeInformations();
                $msgErreur =  "Connexion echouee";
                require 'view/vueErreur.php';
                break;
            }
        }
    #endregion

    #region deconnexion
        
        case 'deconnexion':
        {
            session_destroy();
            $typeManager = new TypeManager;
            $postMananger = new PostManager();
            $posts = $postMananger->getBillets();
            $types = $typeManager->getTypeInformations();
            require 'view/vueConnexion.php';
            break;
        }
    #endregion

    #region rechercher 
        case 'rechercher':
        {
            $unIdType = $_POST['idType'];
            $unIdType = explode("-",$unIdType); 

            $typeManager = new TypeManager;
            $postMananger = new PostManager();
            $posts = $postMananger->getBilletsPrecis($unIdType[1]);
            $types = $typeManager->getTypeInformations();
            require 'view/vueAccueil.php';
            break;
        }
    #endregion

    #region Historique
    case 'historique':
        {
            $typeManager = new TypeManager;
            $postMananger = new PostManager();
            $posts = $postMananger->getBillets();
            $types = $typeManager->getTypeInformations();
            require 'view/vueMajBlog.php';
            break;
        }
    #endregion

}


