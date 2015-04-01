<?php
	$titre= "Identification utilisateur" ;
	if(!isset($_REQUEST['action'])){
		$_REQUEST['action'] = 'demandeConnexion';
	}
	$action = $_REQUEST['action'];
	switch($action){
		case 'demandeConnexion':{
			include("vues/v_entete_contenu.php");
			include("vues/v_connexion.php");
			break;
		}
		case 'valideConnexion':{
			$login = $_REQUEST['login'];
			$mdp = $_REQUEST['mdp'];
			$visiteur = $pdo->getInfosVisiteur($login,$mdp);
			if(!is_array( $visiteur)){
				include("vues/v_entete_contenu.php");
				ajouterErreur("Login ou mot de passe incorrect");
				include("vues/v_erreurs.php");
				include("vues/v_connexion.php");
			}
			else{
				$idType = $visiteur['idtype'];
				$typeUtilisateur = $visiteur['typeutilisateur'];
				if($idType == "v")
				{
					$id = $visiteur['id'];
					$nom =  $visiteur['nom'];
					$prenom = $visiteur['prenom'];
					connecter($id,$nom,$prenom, $typeUtilisateur);
					include("vues/v_sommaire.php");
					include("vues/v_accueil.php");  
				}
				else if($idType == "s")
				{
					$id = $visiteur['id'];
					$nom =  $visiteur['nom'];
					$prenom = $visiteur['prenom'];
					connecter($id,$nom,$prenom, $typeUtilisateur);
					
					include("vues/v_accueil.php");
				
				}
				else if($idType == "c")
				{
					
				}
			}
			break;
		}
		default :{
			include("vues/v_entete_contenu.php");
			include("vues/v_connexion.php");
			break;
		}
	}
?>