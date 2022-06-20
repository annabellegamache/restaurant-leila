<?php
// classe qui permet d'encapsuler les reglage vers la BD
class AccesBd 
{
    // Propriété de la classe
    private $pdo = null;  //Connexion PDO
    private $requete = null;  // Requête paramétrée PDO

    // Constructeur (permet de configurer la connexion PDO)
    function __construct()
    {
        //verifie si il y a deja une connexion 
        if(!$this->pdo){
            $options =[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ];
            $this->pdo = new PDO("mysql:host=".BD_HOTE."; dbname=".BD_NOM."; charset=utf8", BD_UTIL, BD_MDP, $options);
        }
    }

    // Méthodes de la classe (implémentation de toutes les opérations CRUD)
    /**
     * Soumet une requête paramétrée
     *
     * @param  string $sql : Requête SQL
     * @param  array $params Tableau des paramèetres utilisés dans la requête sql
     * @return void
     */
    private function  soumettre($sql, $params)
    {
        $this->requete = $this->pdo->prepare($sql); //retourne une PDO statement
        $this->requete->execute($params); //envoi la requête
    }
    
   /**
    * Fonction qui obtient un jeu d'enregistrement de la BD
    * @param string $sql Requete SQL
    * @param array $sprams Paramèetre à passer à la requête paramétrées PDO
    * @param boolen $groupe true si on veut groupé le jeu d'enregistrement dans le tableay php retourné, defaut=true
    * @return array Tableau contenant les rnregistrements

    *
    */
    protected function lire($sql, $groupe=true, $params = [])
    {
        $this->soumettre($sql, $params);
        /*$enregistrements = []; //pour recevoir les données
       while ($enreg = $this->requete->fetch()) {
            $enregistrements[$enreg->cat_nom][] = $enreg; // $enreg->cat_nom][] = trop specifique 
        }
        return $enregistrements;*/
        if($groupe) {
            return $this->requete->fetchAll(PDO::FETCH_GROUP); //retourne tout les enregistrement de la bd sans grouper
        }else{
            return $this->requete->fetchAll();
        }
    }







    public function creer($sql, $params)
    {
        $this->soumettre($sql, $params);
        return $this->pdo->lastInsertId();
    }

    public function modifier($sql, $params)
    {
        $this->soumettre($sql, $params);
        return $this->requete->rowCount();
    }

    public function supprimer($sql, $params)
    {
        $this->soumettre($sql, $params);
        return $this->requete->affected_rorowCount();
    }
}