<?php
    class Modele_Sujets extends BaseDAO
    {
       public function getTableName()
       {
           return "sujets";
       }
        
        public function getPrimaryKey()
        {
            return "id_sujets";
        }
        
        public function obtenir_par_id($id_s)
        {
            $resultat = $this->lire($id_s);
            $resultat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Sujets");
            $le_sujet = $resultat->fetch();
            return $le_sujet;
        }
        
        public function obtenir_tous()
        {
            $resultats = $this->lireTous();
            $les_sujets = $resultats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Sujets");
            return $les_sujets;
        }
        
        public function sauvegarde(Sujets $le_sujet)
		{			
						
				$query = "INSERT INTO " . $this->getTableName() . " (titre_sujets, texte_sujets, date_creation_sujet, username_usager) VALUES (?, ?, ?, ?)";
				$donnees = array($le_sujet->getTitreSujets(), $le_sujet->getTexteSujets(), $le_sujet->date_creation_sujet, $le_sujet->username_usager);

				return $this->requete($query, $donnees);
			
		}
        
        public function obtenir_sujets_derniere_reponse_DESC()
        {
            $query = "SELECT sujets.titre_sujets, sujets.texte_sujets AS texte_sujets, COUNT(reponse.texte_reponse) AS nombre_reponse, MAX(reponse.date_creation_reponse) AS date_derniere_reponse, sujets.id_sujets as id_sujets, sujets.username_usager, sujets.date_creation_sujet as date_creation_sujet, reponse.username_usager as username_usager_reponse  FROM sujets LEFT JOIN reponse ON reponse.id_sujets = sujets.id_sujets  GROUP BY id_sujets  ORDER BY date_creation_reponse DESC";
            $resultats = $this->requete($query);
            $resultats->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Sujets");
            $les_sujets_par_reponse = $resultats->fetchAll();
            return $les_sujets_par_reponse;
        }
        
      
        
        
        
    }
?>