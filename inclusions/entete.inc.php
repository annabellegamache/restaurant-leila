<?php
    //Étape 1 : inclure la config de la bd
    include('config/bd.cfg.php'); /*devrai être caché dans le serveur...chemin absolue*/
    






    /* devrait inclure un fichier autochargement des classes */
    //Logique pour intégrer la BD
    include('modeles/acces-bd.cls.php');
    include('modeles/plat-modele.cls.php');
    include('modeles/vin-modele.cls.php');


    //Autochargement des classes spl_autoload_register ...fonctions SPL de la librairie
   /* spl_autoload_register(function ($nomClasse){  //calllback fonction anonyme
      //on dit a php quand tu vois new...include le fichier de la classe
      //le call back sera appeler quand il va lire new Chien.... new Chat
      $fichierClasse = "$nomClasse.cls.php";
      if(file_exists($fichierClasse)){
          include($fichierClasse);
      }else {
          exit("Problème majeure");
      }
 });*/
   
?>
<!DOCTYPE html>
<html>
<head>
  <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:700,900|Roboto+Slab:300,700|Roboto:700,400' rel='stylesheet' type='text/css'>
  <meta charset="UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <title>Accueil | Restaurant Leila</title>
  <meta name="description" content="Restaurant Leila - Montréal">
  <link rel="stylesheet" href="css/ext/normalize.css">
  <link rel="stylesheet" href="css/leila.css">
</head>
<body>
  <div id="conteneur" class="page-accueil">
    <header>
      <div class="barre-haut">
        <nav class="social">
          <a href="http://www.facebook.com" target="lien-externe">
            <img alt="Facebook" src="images/iu/nav-icone-facebook.svg">
          </a>
          <a href="http://www.twitter.com" target="lien-externe">
            <img alt="Twitter" src="images/iu/nav-icone-twitter.svg">
          </a>
        </nav>
        <nav class="i18n">
          <a href="#" class="actif" title="Français">fr</a>
          <a href="#" title="English">en</a>
        </nav>
      </div>