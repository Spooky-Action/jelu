<?php 

class Controleur_Sujets extends BaseControleur
{
    public function traite(array $params)
    {
        if (isset($params["action"])) {
            switch ($params["action"]) {
                //Dans les case, on va chercher a nouveau la vue header pour sassurer que ses options se rafraichissent
                case "acces_administrateur":
                    $this->afficheVue('Header');
                    if ((isset($_SESSION["username_usager"])) && $_SESSION["admin_usager"]) {
                        $this->affichePageAdmin();  
                    } else {
                        //On renvoi vers la page login si pas connecter et/ou pas admin
                        $this->afficheVue('Login');
                    }
                    break;    
                    
                case "connexion":
                    $this->afficheVue('Header');
                    $this->afficheVue('Login');
                    break;
                    
                case "login":
                    if(isset($_POST["username_usager"]) && isset($_POST["password_usager"])) {
                        $this->login($_POST["username_usager"], $_POST["password_usager"]);
                        // echo 'function login';
                        $this->afficheVue('Header');
                        $this->afficherLesSujets();
                    }else{
                        $this->afficheVue('Header');
			            echo 'Une erreur sest produite';
                        $this->afficheVue('Login');
                    }
                    break;
                case "logout":
                    
                    $this->logout();
                    $this->afficheVue('Header');
                    $this->afficheVue('Login');

                    break; 
		      // mise a jour du statut Banni ou Authoriser des usagers. Accessible seulement aux utilisateurs admin
                case "majstatut":
                    $this->afficheVue('Header');
                    if(isset($_SESSION['username_usager']) && $_SESSION['admin_usager'] && $_SESSION['banni_usager'] == 0){
                        $modeleUsager = $this->getDAO('Usager');
                        if(isset($_POST['usager'])){
//                            var_dump($_POST['usager']);
//                            echo '<br><br>';
                            foreach($_POST['usager'] as $username => $banni ){
//                                echo 'usager de la db';
                                $monUsager = $modeleUsager->obtenir_par_id($username);
//                                var_dump($monUsager);
//                                echo '<br><br> on change le statut banni';
                                $monUsager->setBanniUsager($banni);
//                                var_dump($monUsager);
//                                echo '<br><br>';
                                $resultat = $modeleUsager->sauvegarde($monUsager);
                            }
                            $this->affichePageAdmin();
                        }else{
                            triggor_error('Erreur, il ny avait pas dusagers');
                        }
                           }
                    break;

        //  -------------------------------------------------------------
                case 'forum':
                    $this->afficheVue('Header');
                    if(isset($_SESSION['username_usager'])){
                            $this->afficherLesSujets();
                    }else{
                        $this->afficheVue('Login');
                    }
                    break;
                    
                case 'sujet':
                    $this->afficheVue('Header');
                    if(isset($_GET['sujetid']) && isset($_SESSION['username_usager'])){
                        $this->afficherUnSujet($_GET['sujetid']);
                    }else{
                        $this->afficherLesSujets();
                    }
		            if(!isset($_SESSION['username_usager'])){
                        $this->afficheVue('Login');
                    }
                    break;

                case "nouvellereponse":
                    $this->afficheVue('Header');
                    if(isset($_SESSION['username_usager'])){
                        $this->afficheVue('FormNouvelleReponse');
                    }else{
                        $this->afficheVue('Login');
                    }

                    break;

                case "ajoutNouvelleReponse":
                    $this->afficheVue('Header');

                    if(isset($params["titre_reponse"], $params["texte_reponse"], $_SESSION['username_usager'])){
                                    

                        $laReponse = new Reponse(0, $params["titre_reponse"], $params["texte_reponse"], date("Y-m-d H:i:s"), $_POST['idsujet'],$_SESSION["username_usager"]);

                        $modeleReponse = $this->getDAO("Reponse");

                        $ajout = $modeleReponse->sauvegarde($laReponse);
                        
                        if($ajout){
                            $this->afficherLesSujets();
                        }
                        else{

                            echo "Il y a eu une erreur!";
                        }
                    }         
                    else{
                        echo "Tout les champs doivent etre remplis!";
                    }
                
                    break;
                case "nouveausujet":
                    $this->afficheVue('Header');

                    if(isset($_SESSION['username_usager'])){
                        $this->afficheVue('FormNouveauSujet');
                    }else{
                        $this->afficheVue('Login');
                    }
                    break;
                    
                case 'ajoutNouveauSujet':
                    $this->afficheVue('Header');

                    if(isset($params["titre_sujet"], $params["texte_sujet"], $_SESSION['username_usager'])){
                        $leSujet = new Sujets(0, $params["titre_sujet"], $params["texte_sujet"], date("Y-m-d H:i:s"),$_SESSION["username_usager"]);
                        $modeleSujets = $this->getDAO("Sujets");
                        $ajout = $modeleSujets->sauvegarde($leSujet);
                        if($ajout){
                            $this->afficherLesSujets();
                        }else{
                            echo "Il y a eu une erreur!";
                        }
                    }else{
                        echo "Tout les champs doivent etre remplis!";
                    }

                    break;
                default:

                    $this->afficheVue('Header');
                    $this->afficherLesSujets();
                    break;
                
            }
            $this->afficheVue('Footer');
        }else{
            $this->afficheVue('Header');
            $this->afficheVue('Login');
            $this->afficheVue('Footer');
        }
    }
                    


    public function afficherLesSujets(){
        $modeleSujets = $this->getDao('Sujets');
        // var_dump($modeleSujets->obtenir_sujets_derniere_reponse_DESC());
        $donnees = $modeleSujets->obtenir_sujets_derniere_reponse_DESC();
        $this->afficheVue('Forum', $donnees);
    }

    public function afficherUnSujet($id_sujet){
        $modeleSujet = $this->getDAO('Sujets'); 
        $donnees['Sujets'] = $modeleSujet->obtenir_par_id($id_sujet);
        $modeleReponse =  $this->getDAO('Reponse');
        $donnees['Reponse'] = $modeleReponse->obtenir_reponse_par_id_sujets($id_sujet);
        $this->afficheVue('Sujet', $donnees);
    }

    public function affichePageAdmin(){
        $modeleUsager = $this->getDAO('Usager');
        $donnees['Usager'] = $modeleUsager->obtenir_tous();
        $this->afficheVue('GestionAdmin', $donnees);
    } 

}                  
?>