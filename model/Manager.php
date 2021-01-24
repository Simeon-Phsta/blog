<?php



class Manager
{
    // effectue la connexion à la BDD
    // instancie et renvoie l'objet PDO associé
    protected function getBdd(){
        $bdd = new PDO('mysql:host=localhost;dbname=mvc_blog_perso;charset=utf8',
            'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $bdd;
    }
}
