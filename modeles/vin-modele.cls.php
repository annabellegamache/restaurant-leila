<?php
class VinModele extends AccesBd{
    /**
     * Cherche tous les vins groupés par nom de catégorie
     * @return {object[]} Tableau d'objets stansdards PHP contenant les enregistrements des vins
     */
    public function tout(){
        //Implémentation de la méthode
        $sql = "SELECT cat_nom, vin.* FROM vin
                JOIN categorie
                ON vin_cat_id_ce = cat_id
                WHERE cat_type = 'vin'
                ORDER BY cat_id";
      return $this->lire($sql);
    }

    public function ajouter(){

    }

    public function changer(){
        
    }

    public function retirer(){
        
    }
}