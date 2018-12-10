<?php
    class Modele_Reponse extends BaseDAO
    {
       public function getTableName()
       {
           return "reponse";
       }
        
        public function getPrimaryKey()
        {
            return "id_reponse";
        }
        
        public function obtenir_par_id($id)
        {
            $resultat = $this->lire($id);
            $resultat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Reponse");
            $la_reponse = $resultat->fetch();
            return $la_reponse;
        }
        
        public function obtenir_tous()
        {
            $resultats = $this->lireTous();
            $lesFilms = $resultats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Reponse");
            return $les_reponses;
        }
        
        public function sauvegarde(Reponse $la_reponse)
		{			
		
				$query = "INSERT INTO " . $this->getTableName() . " (titre_reponse, texte_reponse, date_creation_reponse, id_sujets, username_usager) VALUES (?, ?, ?, ?, ?)";
				$donnees = array($la_reponse->getTitreReponse(), $la_reponse->getTexteReponse(), $la_reponse->getDateCreationReponse(), $la_reponse->getIdSujet(), $la_reponse->getUsernameUsager());
				return $this->requete($query, $donnees);
			
		}
        
       
        
        public function obtenir_reponse_par_id_sujets($id_s)
        {
            $query = "SELECT * FROM " . $this->getTableName()." WHERE id_sujets = ".$id_s." ORDER BY date_creation_reponse DESC";
            $resultats = $this->requete($query);
            $les_reponses = $resultats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Reponse");
            return $les_reponses;
        }
        
          
        
       
        
    }

?>