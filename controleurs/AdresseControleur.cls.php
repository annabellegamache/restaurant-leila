<?php
class Adresse extends Controleur  /*controler = interactivité = vue .....modele = bd*/
{

    /*Action par defaut si aucune action elle fait ombre a l'autre methode...elle cache la method parents*/
    public function index($params)
    {
        $this->gabarit->affecterActionDefaut('tout');
        $this->tout($params);
        
    }

    public function tout($params)
    {
        //Instancier modele et appeler la methode tout sur le modele
        //Chercher les plats de la BD (job de la classe PlatModele)
        $resultat = $this->modele->tout(); // doit prendre le resultat de la bd et l'injecter dans la vue
        $this->gabarit->affecter('adresse', $resultat);  //menu = etiquette... $menu dans vue plats

    }

    public function ajouter()
    {
       // $_POST;  Superglobal tableau à l aportée de toute l'application

    }
}