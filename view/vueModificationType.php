<?php $titre = 'Modification' ; ?>

<?php ob_start(); ?>

<div class="form_modif">
    <form method="POST" action="index.php?uc=type&action=modifierType">
    
        <label for="idType" accesskey="idType">idType : </label>
        <input type="hidden" id="idType" name="idType"  value="<?= $_REQUEST['id'] ?>"><?= $_REQUEST['id'] ?><br><br>

        <textarea type="text" name="libelle" id="libelle" size="30" maxlength="100" ><?= $type['libelle'] ?></textarea></br><br>

        <button id="modifier">Modifier</button>

    </form>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'view/gabarit.php';?>