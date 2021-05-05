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
            $postMananger = new PostManager();
            $typeManager = new TypeManager;
            $posts = $postMananger->getBillets();
            $types = $typeManager->getTypeInformations();
            require 'view/vueAccueilType.php';
            break;
        }
    #endregion

    #region Insert to
        case 'ajoutType':
        {
            $libelle = $_POST['libelle'];
            $postMananger = new PostManager();
            $typeManager = new typeManager;
            $typeManager->addType($libelle);
            $posts = $postMananger->getBillets();
            $types = $typeManager->getTypeInformations();
            require 'view/vueAccueilType.php';
            break;
        }
    #endregion

    #region Delete
        case 'supprimerType':
        {
            $postMananger = new PostManager();
            $typeManager = new typeManager;
            $typeManager->deleteType($_POST['id']);
            $posts = $postMananger->getBillets();
            $types = $typeManager->getTypeInformations();
            require 'view/vueAccueilType.php';
            break;
        }
    #endregion

    #region Update
        case 'premodifierType':
        {  
            $typeMananger = new typeManager();
            $postMananger = new PostManager();
            $posts = $postMananger->getBillets();
            $type = $typeMananger->getType($_POST['id']);
            $types = $typeMananger->getTypeInformations();
            require 'view/vueModificationType.php';
            break;
        }

        case 'modifierType':
        {
            $unId = $_POST['idType'];
            $unLibelle = $_POST['libelle'];
            
            $typeManager = new typeManager();
            $typeManager ->updateType($unId,$unLibelle);
            
            if (isset($_SESSION['pseudo'])){
                $postMananger = new PostManager();
                $typeMananger = new typeManager();
                $posts = $postMananger->getBillets();
                $types = $typeManager->getTypeInformations();
                require 'view/vueAccueilType.php';
                break;
            }
            else{
                require 'view/vueErreur.php';
                break;
            }
        }
    #endregion
}
