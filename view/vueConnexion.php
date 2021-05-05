<?php $titre = 'Connexion'; ?>

<?php ob_start(); ?>

<p>Bienvenue, identifies toi pour acceder au site:</p>
  <form method="post" action="index.php?uc=accueil&action=connexion">
  <label for="pseudo">Pseudo</label> :
      <input type="text" name="pseudo" id="motdepasse" name="pseudo" placeholder="Votre pseudo"/><br><br>
    <label for="motdepasse">Mot de passe</label> :
      <input type="password" name="motdepasse" id="motdepasse" name="motdepasse" placeholder="Votre mot de passe"/><br><br>
    <button id="valider">Connexion</button>
  </form>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>