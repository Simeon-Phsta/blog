<?php $titre = 'Modification' ; ?>

<?php ob_start(); ?>

<div class="form_modif">
<form enctype="multipart/form-data" method="POST" action="index.php?uc=post&action=modificationPost">
 
    <label for="idPost" accesskey="idPost">idPost : </label>
    <input type="hidden" id="idPost" name="idPost"  value="<?= $_REQUEST['id'] ?>"><?= $_REQUEST['id'] ?><br><br>

    <textarea type="text" name="titrePost" id="titrePost" size="30" maxlength="100" ><?= $billet['titre'] ?></textarea></br><br>

    <textarea type="text" name="contenuPost" id="contenuPost" cols="45" rows="10"  maxlength="1000"><?= $billet['contenu'] ?></textarea><br><br>

    <textarea type="text" name="unLien" placeholder="Lien vers le sujet" size="30" maxlength="100"><?= $billet['lien'] ?></textarea><br><br>
    
    <input type="file" name="image" capture="user"><br><br>

    <?php echo ($billet['typeBillet']);?>
    
    <select name="unType">
        <?php while ($dat = $types->fetch()) { ?>
           
        <option <?php if($billet['idTypeBillet'] == $dat['id']) { echo ("selected");}?> name="unType"><?php echo("" . $dat['libelle'] . "-" . $dat['id'] );  ?></option>
        <?php  } ?>
    </select><br><br>

    <button id="modifier">Modifier</button>

</form>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'view/gabarit.php';?>