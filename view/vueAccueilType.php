<?php $titre = 'Type' ; ?>

<?php ob_start(); ?>

<a href="index.php?uc=post&action=accueil">Ajouter un post</a>

<br><br><br>
<table  class="center">
    <thead>
        <th>idType</th>
        <th>Type</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </thead>
    <tbody>
        <?php foreach($types as $type): ?>
            <tr>
                <td><?= $type['id']?></td>
                <td><?= $type['libelle']?></td>
                <td><a href="<?="index.php?uc=type&action=premodifierType&id=" . $type['id'] ?>">modifier</a></td>
                <td><a href="<?="index.php?uc=type&action=supprimerType&id=" . $type['id'] ?>">supprimer</a></td>
            </tr>
            <?php endforeach?>
    </tbody>
</table>

<br><br><br>
<div class="form_modif">
<form method="POST" action="index.php?uc=type&action=ajoutType">
 
    <label>Nom du type:</label>
    
    <textarea type="text" name="libelle" id="libelle" size="30" maxlength="100" ></textarea></br><br>

    <button id="ajouter">Ajouter</button>

</form>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'view/gabarit.php';?>