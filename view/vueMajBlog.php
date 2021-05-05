<?php $titre = 'Historique MAJ'; ?>
<?php ob_start(); ?>

<p>09/01/2021 <br>
En repartant de projet blog vu en cours, je l'ai amélioré avec le système de type pour un post <br>
Gestion des types, afficher des posts d'un type précis gestion du type pour un post et maj de la bdd</p> 

<p>16/01/2021 <br>
Mise en place des photos pour illustrer les articles et les changements au niveau de la page d'accueil</p> 


<br><br><br><br><br><br><br><br><hr>
<p>Ajouts que je voudrais mettre en place pour la suite: <br>
<ul>
    <li>Newsletter</li>
    <li>Sys de modération</li>
    <li>MAJ du gabarit</li>   
    <li>MAJ du template</li>
</ul>
</p>
<hr>
<?php $contenu = ob_get_clean(); 
require 'gabarit.php'; ?>