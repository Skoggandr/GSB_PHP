<?php
	include("vues/v_sommaire.php");
	$action = $_REQUEST['action'];
	$idVisiteur = $_SESSION['idVisiteur'];
	$titre = "Mes fiches de frais";
	include("vues/v_entete_contenu.php");
	switch($action){
		case 'selectionnerMois':{
			$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
			// Afin de sélectionner par défaut le dernier mois dans la zone de liste , on demande toutes les clés, et on prend la première, 
			// les mois étant triés décroissants
			$lesCles = array_keys( $lesMois );
			if (count($lesCles)!=0) {
				$leMois = $lesCles[0];
				$moisASelectionner = $leMois;
			}
			else {
				ajouterErreur("Aucune fiche de frais n'a été saisie pour ce visiteur");
			}
			break;
		}
		case 'voirEtatFrais':{
			$leMois = $_REQUEST['lstMois']; 
			$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
			$moisASelectionner = $leMois;
		}
	}
	if (nbErreurs() != 0 ){
		include("vues/v_erreurs.php");
	}
	else{
		include("vues/v_listeMois.php");
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
		$numAnnee = substr( $leMois,0,4);
		$numMois = substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$idEtat = $lesInfosFicheFrais['idEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  convertirDateAnglaisVersFrancais($dateModif);
		include("vues/v_etatFrais.php");
	}
?>