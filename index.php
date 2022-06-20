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
    //Autochargement des classes dans rep modele et controleur
    spl_autoload_register(function ($nomClasse){  //calllback fonction anonyme
      $nomFichier = "$nomClasse.cls.php";
      if(file_exists("modeles/$nomFichier")){
          include("modeles/$nomFichier"); 
      }
      else if(file_exists("controleurs/$nomFichier")){
        include("controleurs/$nomFichier");
      }
      else if(file_exists("gabarits/$nomFichier")){
        include("gabarits/$nomFichier");
      }
    });
  }// fin __construct Routeur

  //determine d'apers la route dans le url quel module on veut utiliser
  public function invoquerRoute()
  {
    $module = "accueil" ; // Autres possibilités:  plat, vin etc..
    $action = "index"; // par defaut quand tu arrives sur une page ... pourrait etre tout , ajouter, suppimer
    $params = "";
    $routeTableau = explode('/', $this->route);  //Exemple: [plate, supprimer, 15]  --> plat/spprimer/15 

    if(count($routeTableau) > 0 && trim($routeTableau[0]) != ''){
      $module = array_shift($routeTableau); //retourne le premier element du tableau et l'enleve du tableau ex: [supprimer, 15]..shit = [plate, supprimer, 15] 
      //recompte le tableau
      if(count($routeTableau) > 0 && trim($routeTableau[0]) != ''){
        $action = array_shift($routeTableau); // $action = ' ex: supprimer' et routeTableau = ['17']
        $params = $routeTableau; // Ce qui reste du tableau sera les parametres si il en a...
      }
    }

    //Instancier le controleur correspondant au module indiqué et invoquer la méthode de cet object correspondant a l'action indiqué
    $nomControleur = ucfirst($module).'Controleur'; // premiere lette en majuscule ucfirst() ex: AcceuilControleur ou Platcontroleur etc...
    $nomModele = ucfirst($module).'Modele';

    //par defaut si il existe include la classe automatiquement...peut mettre false en arguments.
    if(class_exists($nomControleur)){
      if(!method_exists($nomControleur, $action)){  //verifie si methode exists dans la classe (instance avec la fonction souhaiter reste index sinon on instance...)
        $action = "index"; /// ex: pour donner plat.index.php 
      }
      /*on instancie le controler et on instancie on appelle l'action */
      $controleur = new $nomControleur($nomModele, $module, $action);
      $controleur->$action($params); //apelle methode
    }
    else {
      $controleur = new Controleur('', 'accueil', 'index'); //nomModele, module et action
    }
   
  }// fin invoquerRoute



} // fin classe Routeur