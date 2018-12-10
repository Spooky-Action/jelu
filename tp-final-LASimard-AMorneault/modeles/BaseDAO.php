<?php
	abstract class BaseDao
	{
		protected $db;

		public function __construct(PDO $dbPDO)
		{			
			$this->db = $dbPDO;
		}
			
		public function supprimer($clePrimaire)
		{
			$query = "DELETE FROM " . $this->getTableName() . " WHERE " . $this->getPrimaryKey() ."=?";
			$donnees = array($clePrimaire);
			return $this->requete($query, $donnees);
		}

	
		protected function lire($valeurCherchee, $cle = NULL)
		{
			if(!isset($cle)){
				$query = "SELECT * from " . $this->getTableName() . " WHERE " . $this->getPrimaryKey() ."=?";
			}
			else{
				$query = "SELECT * from " . $this->getTableName() . " WHERE " . $cle ."=?";
			}
			$donnees = array($valeurCherchee);
			return $this->requete($query, $donnees);
		}

		
		protected function lireTous()
		{
			$query = "SELECT * from " . $this->getTableName();
			return $this->requete($query);
		}

	
		final protected function requete($query, $data = array())
		{
			try
			{
				$stmt = $this->db->prepare($query);
                
				$stmt->execute($data);
                
			}
			catch(PDOException $e)
			{
				trigger_error("<p>La requête suivante a donné une erreur : $query</p><p>Exception : " . $e->getMessage() . "</p>");
                return false;
			}
			return $stmt;
            //var_dump($stmt);die;
		}
		
		abstract protected function getPrimaryKey();
		abstract function getTableName();	
	}
?>