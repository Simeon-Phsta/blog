<?php $titre = 'Blog'; ?>

<?php ob_start(); ?>


<div class="affichageBillets">
  <div class="container">
    <div class="row">
<?php while ($data = $posts->fetch())
{ ?>
      <div class="col-sm-12 col-md-12 col-xl-4">
        <div class="card shadow-sm">
            <img src="<?php echo("public/img/".$data['img'])?>" width="100%" height="100%" >
            <div class="card-body">
              <p class="card-text"><?=$data['titre']  ?><br><?= $data['typeBillet'] ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?= "index.php?uc=post&action=afficherPost&id=" . $data['id'] ?>"><button type="submit" class="btn btn-sm btn-outline-secondary">Voir</button></a>
                  <?php if(isset($_SESSION['pseudo'])){ ?>
                    <a href="<?= "index.php?uc=post&action=preModificationPost&id=" . $data['id'] ?>"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                    <a href="<?= "index.php?uc=post&action=suppressionPost&id=" . $data['id'] ?>"><button type="button" class="btn btn-sm btn-outline-secondary">Supprimer</button></a>
                  <?php } ?>
                </div>
                <small class="text-muted"><?= $data['date'] ?></small>
              </div>
            </div>
        </div>
      </div>
<?php }?>
    </div>
  </div>
</div>
<?php $contenu = ob_get_clean(); 
require 'gabarit.php'; ?>