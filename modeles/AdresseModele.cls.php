<?php
class AdresseModele extends AccesBd {
    public function tout(){
        //Implémentation de la méthode
        // SELECT * ... on met la nom de la colonne explicitement parce que PDO :: FETCH_GROUP va grouper par le nom de la colonne tout de suite  apres le SELECT
        $sql = "SELECT * FROM adresse";     
        return $this->lire($sql, false); //retourne le jeu d'enregistrement de la BD grouper par la catégorie
    }

    public function ajouter(){

    }

    public function changer(){
        
    }

    public function retirer(){
        
    }
}