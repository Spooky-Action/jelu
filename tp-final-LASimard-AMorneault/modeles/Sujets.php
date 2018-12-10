<?php
    class Sujets
    {
        protected $id_sujets;
        protected $titre_sujets;
        protected $texte_sujets;
        public $date_creation_sujet;
        public $username_usager;
     
        
        public function __construct($id_s = 0, $tr_s = "", $tx_s = "", $dcs = "", $uu = '')
        {
            $this->id_sujets = $id_s;
            $this->setTitreSujets($tr_s);
            $this->setTexteSujets($tx_s);
            $this->date_creation_sujet = $dcs;
            $this->username_usager = $uu;
        
        }
        
        public function getIdSujets(){
            return $this->id_sujets;
        }
        public function getTitreSujets(){
            return $this->titre_sujets;
        }
        public function getTexteSujets(){
            return $this->texte_sujets;
        }
        public function getDateCreation(){
            return $this->date_creation_sujet;
        }
        public function getUsernameAuteur(){
            return $this->username_usager;
        }
        
        public function setTitreSujets($t){
            if(is_string($t)){
                $this->titre_sujets = $t;
            }else{
                trigger_error("Votre sujet a besoin d'un titre!");
            }
        }
        public function setTexteSujets($t){
            if(is_string($t)){
                $this->texte_sujets = $t;
            }else{
                trigger_error("Votre sujet a besoin d'un texte!");
            }
            
        }
//        public function setDateCreationSujet(date $d){
//            $this->date_creation_sujet = $d;
//        }
//        public function setUsernameAuteur($u){
//            if($u != ''){
//                $this->username_usager = $u;
//            }else{
//                trigger_error("Votre sujet a besoin d'un auteur!");
//            }
//        }
        
        
    }

?>