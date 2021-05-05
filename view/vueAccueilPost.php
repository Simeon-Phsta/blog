<?php $titre = 'Post'; ?>

<?php ob_start(); ?>

<form enctype="multipart/form-data" method="post" action="index.php?uc=post&action=ajoutPost">
    <p><a href="index.php?uc=type&action=accueil">Gérer les types</a> ou postez un nouveau billet:</p>
    <input type="text" name="unTitre" placeholder="Nom du billet" size="30" maxlength="100"/><br><br>
    <textarea type="text" name="unContenu" placeholder=" Contenu du billet" cols="45" rows="10"  maxlength="1000"></textarea><br><br>
    <input type="text" name="unLien" placeholder="Lien" size="30" maxlength="100"/><br><br>
    <input type="file" name="image" capture="user"><br><br>

    <select name="unType">
    <?php while ($dat = $types->fetch()) { ?>
    <option selected name="unType"><?php echo("" . $dat['libelle'] . "-" . $dat['id']);  ?></option>
    <?php } ?>
    </select><br><br>
    <button id="valider">Valider</button>

    
</form>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>