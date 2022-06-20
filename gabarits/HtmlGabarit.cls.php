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

    public function affecterActionDefaut($nomAction){ //pour gerer methode /tout /i
        $this->action = $nomAction;
    }

    public function genererVue()
    {
        extract($this->variables);// deballe le sac...methode qui extrait les variables clé du tableau associatif...voir doc peut etre dangeureux
        include("vues/entete.inc.php");
        // inclure module et action... 
        include("vues/$this->module.$this->action.php"); /// ex: plat.tout.php....//eneleve sitch du mvc procedurale tp2 session2
        include("vues/pied2page.inc.php");
    }
}