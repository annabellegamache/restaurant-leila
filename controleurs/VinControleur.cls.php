<?php
class VinControleur extends Controleur
{
        /*Action par defaut si aucune action */
        public function index($params)
        {
            $this->gabarit->affecterActionDefaut('tout');
            $this->tout($params);
            
        }
    
        public function tout($params)
        {
            //Instancier modele et appeler la methode tout sur le modele
            //Chercher les vins de la BD (job de la classe VinModele)
            $resultat = $this->modele->tout(); // doit prendre le resultat de la bd et l'injecter dans la vue
            $this->gabarit->affecter('vin', $resultat);  //menu = etiquette...
    
        }
    
        public function ajouter()
        {
           // $_POST;  Superglobal tableau à l aportée de toute l'application
    
        }
}