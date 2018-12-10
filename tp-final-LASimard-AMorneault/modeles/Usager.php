<?php
    class Usager
    {
        public $username_usager;
        public $password_usager;
        public $banni_usager;
        public $admin_usager;

        public function __construct($uu = "", $pu = "", $bu = "false", $au = "")
        {
            $this->username_usager = $uu;
            $this->password_usager = $pu;
            $this->banni_usager = $bu;
            $this->admin_usager = $au;
        }
        
        
        public function getUsernameUsager(){
            return $this->username_usager;
               
        }
        public function getPassword_usager(){
            return $this->password_usager;
               
        }
        public function getBanniUsager(){
            return $this->banni_usager;
        }   
        public function setBanniUsager($banni){
            $this->banni_usager = $banni;
        }
    }

?>