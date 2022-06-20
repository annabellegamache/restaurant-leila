<?php
//OChaque controler herite de ce controleur 
class Controleur{
    protected $modele;
    protected $gabarit; // servira a generer la vue

    /*methode magique appeler a new */
    function __construct($modele, $module, $action)
    {
        //verirife si existe avant instance
        if(class_exists($modele)){
            $this->modele =new $modele(); //On pourra s'en servir pour appeler les differente methode
        }
        //injece le resultat dans la vue
        $this->gabarit = new HtmlGabarit($module, $action);
        $this->gabarit->affecter('page', $module);
    }

    /* methode magique qui detruit l'objet apres generer le code */
    function __destruct()
    {
        $this->gabarit->genererVue(); //derniere action è la destruction...on affiche la vue
    }

    /*evite des erreurs sans faire des tonnes de if...index est le module par defaut bug accueilControleu...qui n'a pas lieu d'être*/
    public function index($params)
    {

    }

}