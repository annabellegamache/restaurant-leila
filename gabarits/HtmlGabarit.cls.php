<?php
class HtmlGabarit
{
    protected $variables = array();
    protected $module;
    protected $action;

    function __construct($module, $action)
    {
        $this->module = $module;
        $this->action = $action;
    }

    /*rempli en tableau avec valeur indexxer */
    public function affecter($nom, $valeur)
    {
        $this->variables[$nom] = $valeur; //rempli le sac
    }

    public function genererVue()
    {
        extract($this->variables);// deballe le sac...methode qui extrait les variables clé du tableau associatif
        include("vues/entete.inc.php");
        // inclure module et action... 
        include("vues/$this->module.$this->action.php"); /// ex: plat.tout.php....
        include("vues/pied2page.inc.php");
    }
}