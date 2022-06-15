<?php

/*
  Pilote de l'application (Router) ou (Front Controller)
*/

 //Étape 1 : inclure la config de la bd
 include('config/bd.cfg.php'); /*devrai être caché dans le serveur...chemin absolue*/


/*Partie procédurale */
$route = ""; //paramètre url
if(isset($_GET["route"])) {
  // Ex: plat/tout ou vin/ajouter ou plat/spprimer/15
  $route = $_GET["route"];
}

$routeur = new Routeur($route); // Première classe
$routeur->invoquerRoute();


class Routeur
{
  private $route = '';

  function __construct($r)
  {
    $this->route = $r;
    //Autochargement des classes
    spl_autoload_register(function ($nomClasse){  //calllback fonction anonyme
      $nomFichier = "$nomClasse.cls.php";
      if(file_exists("modeles/$nomFichier")){
          include("modeles/$nomFichier");
      }
      else if("controleurs/$nomFichier"){
        include("controleurs/$nomFichier");
      }
      else {
          exit("Problème majeur...");
      }
    });
  }// fin __construct

  public function invoquerRoute()
  {
    $module = "accueil" ; // Autres possibilités:  plat, vin etc..
    $action = "index"; // par defaut quand tu arrives sur une plage
    $param = "";
    $routeTableau = explode('/', $this->route);  //Exemple: [plate, supprimer, 15]  --> plat/spprimer/15 

    if(count($routeTableau) > 0 && trim($routeTableau[0]) != ''){
      $module = array_shift($routeTableau); //retourne le premier element du tableau et l'enleve du tableau ex: [supprimer, 15]..shit = [plate, supprimer, 15] 
      //recompte le tableau
      if(count($routeTableau) > 0 && trim($routeTableau[0]) != ''){
        $action = array_shift($routeTableau); // $action = 'sipprimer' et routeTableau = ['17']
        $param = $routeTableau; // Ce qui reste du tableau sera les parametres si il en a...
      }
    }

    //Instancier le controleur correspondant au module indiqué et invoquer la méthode de cet object correspondant a l'action indiqué
    $nomControleur = ucfirst($module).'Controleur'; // premiere lette en majuscule ucfirst()
    $nomModele = ucfirst($module).'Modele';

    if(class_exists($nomControleur)){
      if(!is_callable(array($nomControleur, $action))){
        $action = "index";
      }
      $controleur = new $nomControleur($nomModele, $module, $action);
      $controleur->$action($param);
    }
    else {
      $controleur = new AccueilControleur();
    }
   
  }// fin invoquerRoute



} // fin classe Routeur