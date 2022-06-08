<?php
class VinModele extends AccesBd{
    public function tout(){
        //Implémentation de la méthode
        $sql = "SELECT * FROM vin
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