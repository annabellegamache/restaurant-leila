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
    }

    /* methode magique qui detruit l'objet apres generer le code */
    function __destruct()
    {
        $this->gabarit->genererVue(); //derniere action è la destruction...on affiche la vue
    }

}