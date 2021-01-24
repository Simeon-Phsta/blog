<!doctype html>
<html lang="fr">

<head>

  <!-- Meta obligatoire pour les sites responsive -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Fichiers CSS -->
  <link rel="stylesheet" type="text/css" href="public/css/style.css">

  <title><?= $titre ?></title>
</head>


<body>

  <header>
    <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">A propos</h4>
            <p class="text-muted">Ce blog a pour but de répertorier tout ce que je trouve comme informations ici et là sur internet que je trouve intéressantes</p>
            
            <br><h4 class="text-white">Rechercher</h4>
            <form method="POST" action="index.php?uc=accueil&action=rechercher">
                <select name="idType">
                    <?php while ($dat = $types->fetch()) { ?>
                        
                    <option <?php if(isset($unIdType[1]) && $unIdType[1] == $dat['id']) { echo ("selected");}?>><?php echo("" . $dat['libelle'] . "-" . $dat['id'] );  ?></option>
                    <?php  } ?>
                </select><br>
                <button id="rechercher">Rechercher</button>
            </form>

          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white"><?php if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] !=''){ echo ("<p>Bienvenue " . $_SESSION['pseudo'] ."</p>");}?></h4>
            <ul class="list-unstyled">
              <?php if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] !='')
              {?>
                <ul>
                  <li><a href="index.php?uc=accueil&action=historique" class="text-white">Historique</a></li>
                  <li><a href="index.php?uc=post" class="text-white">Gérer les posts</a></li>
                  <li><a href="index.php?uc=type" class="text-white">Gérer les types</a></li>
                </ul>
                <ul> 
                  <li><a href="index.php?uc=accueil&action=deconnexion" class="text-white">Déconnexion</a></li>
              <?php } else 
              {?> 
                <ul>
                  <li><a href="index.php?uc=accueil&action=preconnexion" class="text-white">Se connecter</a></li>
                  <li><a href="index.php?uc=accueil&action=historique" class="text-white">Historique</a></li>
              <?php }?>
            <ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <strong><a href="index.php" class="text-white">Journal de bord</a></strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>

  <div id="global">

    <div id="contenu"><!-- #contenu -->
      <?= $contenu ?> 
    </div> 



  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-end mb-1"><a href="#">Retourner en haut</a></p>
      <p class="mb-0">&copy; Chihiro - 2021</p>
    </div>
  </footer>
  </div>
  <script type="text/javascript" src="public/js/bootstrap.js"></script>

  </body>
</html>