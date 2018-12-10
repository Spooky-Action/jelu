<?php
    class Modele_Usager extends BaseDAO
    {
       public function getTableName()
       {
           return "usager";
       }
        
        public function getPrimaryKey()
        {
            return "username_usager";
        }
        
        // Id est en fait le username
        public function obtenir_par_id($id)
        {
            $resultat = $this->lire($id);
            $resultat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usager");
            $un_usager = $resultat->fetch();
            return $un_usager;
        }
        
        public function obtenir_tous()
        {
            $resultats = $this->lireTous();
            $les_usagers = $resultats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usager");
            return $les_usagers;
        }
        
        public function sauvegarde(Usager $un_usager)
		{			
			
				$query = "UPDATE " . $this->getTableName() . " SET banni_usager= ? WHERE username_usager = ? " ;
                $donnees = array($un_usager->banni_usager, $un_usager->username_usager);
				return $this->requete($query, $donnees);
			}
		}
        

        
        
        
    
?>