<?php
class PlatModele extends AccesBd {
    public function tout(){
        //Implémentation de la méthode
        // SELECT * ... on met la nom de la colonne explicitement parce que PDO :: FETCH_GROUP va grouper par le nom de la colonne tout de suite  apres le SELECT
        $sql = "SELECT cat_nom, plat.* FROM plat
                JOIN categorie
                ON pla_cat_id_ce = cat_id
                WHERE cat_type = 'plat'
                ORDER BY cat_id";
      return $this->lire($sql); //retourne le jeu d'enregistrement de la BD grouper par la catégorie
    }

    public function ajouter(){

    }

    public function changer(){
        
    }

    public function retirer(){
        
    }
}