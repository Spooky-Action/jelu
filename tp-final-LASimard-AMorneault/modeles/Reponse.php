<?php
    class   Reponse
    {
        protected $id_reponse;
        protected $titre_reponse;
        protected $texte_reponse;
        protected $date_creation_reponse;
        protected $id_sujet;
        protected $username_usager;


        
        public function __construct($id_r = 0, $tr_rep = "", $tx_rep = "", $dcr = "", $id_s = 0, $uu = "" )
        {
            $this->id_reponse = $id_r;
            $this->titre_reponse = $tr_rep;
            $this->texte_reponse = $tx_rep;
            $this->date_creation_reponse = $dcr;
            $this->id_sujet = $id_s;
            $this->username_usager = $uu;
           
        }
        
        public function getIdReponse()
        {
            return $this->id_reponse;
        }
        
        public function setIdReponse($id_reponse)
        {
            if(is_numeric($id_reponse))
                $this->id_reponse = $id_reponse;
            else
                trigger_error("L'id doit être numerique", E_USER_ERROR);
        }
        
        public function getTitreReponse()
        {
            return $this->titre_reponse;
        }
        
        public function setTitreReponse($titre_reponse)
        {
            if(is_string($titre_reponse))
                $this->titre_reponse = $titre_reponse;
            else
                trigger_error("Le titre doit être une chaine de caractère", E_USER_ERROR);
        }
        
        public function getTexteReponse()
        {
            return $this->texte_reponse;
        }
        
        public function setTexteReponse($texte_reponse)
        {
            if(is_string($texte_reponse))
                $this->texte_reponse = $texte_reponse;
            else
                trigger_error("Le texte doit être une chaine de caractère", E_USER_ERROR);
        }
        
        public function getDateCreationReponse()
        {
            return $this->date_creation_reponse;
        }
        
        public function setDateRreationReponse($date_creation_reponse)
        {
            $this->date_creation_reponse = $date_creation_reponse;
        }
        
         public function getIdSujet()
        {
            return $this->id_sujet;
        }
        
        public function setIdSujet($id_sujet)
        {
            if(is_numeric($id_sujet))
                $this->id_sujet = $id_sujet;
            else
                trigger_error("L'id doit être numerique", E_USER_ERROR);
        }
        
        public function getUsernameUsager()
        {
            return $this->username_usager;
        }
        
        public function setUsernameUsager($username_usager)
        {
            if(is_string($username_usager))
                $this->username_usager = $username_usager;
            else
                trigger_error("Le nom d'usager doit être une chaine de caractère", E_USER_ERROR);
        }
        
    }

?>