<?php $titre = 'Blog'; ?>
<?php ob_start(); ?>

<article>

        <header>
            <h1 class="titreBillet"><?=($billet['titre'])  ?><br><?= $billet['typeBillet'] ?></h1>
            <time><?= $billet['date'] ?></time><br>   
            <?php if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] !=''){ ?>
            <a href="<?= "index.php?uc=post&action=suppressionPost&id=" . $billet['id'] ?>">Supprimer</a> -
            <a href="<?= "index.php?uc=post&action=preModificationPost&id=" . $billet['id'] ?>">Modification</a>
            <?php } ?>  
            <br><br><img src="<?php echo("public/img/".$billet['img'])?>" width="40%" height="40%">   <br><br>   
        </header>
        <p><?= ($billet['contenu']) ?></p>
        <?php if (empty($billet['lien']) == false) { ?><a href="<?=($billet['lien'])?>" target="_blank">Lien</a><br><br><?php }?>
    </article>
    <hr/>


<?php $contenu = ob_get_clean(); 
require 'gabarit.php'; ?>