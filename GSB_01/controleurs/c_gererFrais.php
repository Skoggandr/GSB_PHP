<?php
	include("vues/v_sommaire.php");
	$idVisiteur = $_SESSION['idVisiteur'];
	$mois = getMois(date("d/m/Y"));
	$numAnnee =substr( $mois,0,4);
	$numMois =substr( $mois,4,2);
	$action = $_REQUEST['action'];
	$titre= "Renseigner ma fiche de frais du mois de ".obtenirLibelleMois(intval($numMois)) . " " . $numAnnee;
	include("vues/v_entete_contenu.php");

	switch($action){
		case 'saisirFrais':{
			if($pdo->estPremierFraisMois($idVisiteur,$mois)){
				$pdo->creeNouvellesLignesFrais($idVisiteur,$mois);
			}
			break;
		}
		case 'validerMajFraisForfait':{
			$lesFrais = $_REQUEST['lesFrais'];
			if(lesQteFraisValides($lesFrais)){
				$info= "Les modifications de la fiche de frais ont bien été enregistrées";
				include("vues/v_info.php");

				$pdo->majFraisForfait($idVisiteur,$mois,$lesFrais);
			}
			else{
				ajouterErreur("Les valeurs des frais doivent être numériques");
				include("vues/v_erreurs.php");
			}
		  break;
		}
		case 'validerCreationFrais':{
			$dateFrais = $_REQUEST["dateFrais"];
			$libelle = $_REQUEST["libelle"];
			$montant = $_REQUEST["montant"];
			valideInfosFrais($dateFrais,$libelle,$montant);
			if (nbErreurs() != 0 ){
				include("vues/v_erreurs.php");
			}
			else{
				$info= "Les modifications de la fiche de frais ont bien été enregistrées";
				include("vues/v_info.php");
				$pdo->creeNouveauFraisHorsForfait($idVisiteur,$mois,$libelle,$dateFrais,$montant);
			}
			break;
		}
		case 'supprimerFrais':{
			$idFrais = $_REQUEST['idFrais'];
			$pdo->supprimerFraisHorsForfait($idFrais);
			break;
		}
	}
	$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$mois);
	$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$mois);
	include("vues/v_listeFraisForfait.php");
	include("vues/v_listeFraisHorsForfait.php");

?>