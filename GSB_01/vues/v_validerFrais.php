	<div id="sousContenu">
		<h3>Fiche de frais du mois de <?php echo obtenirLibelleMois($numMois)." ".$numAnnee?> :</h3> 
	    <!--<div class="encadre">-->
<!--		<p>
			Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?>
		</p> -->
		<div id="etatMontant">
			<div id="etat" class="<?php echo $idEtat;?>">
				<?php echo $libEtat?> depuis le <?php echo $dateModif?> 
			</div>
			<div id="montantValide">
				Montant validé
				<div id="valeurMontant"><?php echo $montantValide?> &#8364;</div>
			</div>
		</div>	
		<h4>Eléments forfaitisés :</h4>
		<table class="listeLegere">
			<tr>
<?php			$total=0;
				foreach ( $lesFraisForfait as $unFraisForfait ) {
					$libelle = $unFraisForfait['libelle'];
?>					<th> <?php echo $libelle?></th>
<?php			}
?>
			</tr>
			<tr>
<?php
				foreach (  $lesFraisForfait as $unFraisForfait  ) {
					$quantite = $unFraisForfait['quantite'];
					$total += $quantite;
?>
					<td class="qteForfait"><?php echo $quantite?> </td>
<?php
				}
?>
			</tr>
		</table>
		<h4>Descriptif des éléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -</h4>
		<table class="listeLegere">
			<tr>
				<th class="date">Date</th>
				<th class="libelle">Libellé</th>
                <th class="montant">Montant</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
            </tr>
<?php       
			foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) 
			{
				$date = $unFraisHorsForfait['date'];
				$libelle = $unFraisHorsForfait['libelle'];
				$montant = $unFraisHorsForfait['montant'];
				$id = $unFraisHorsForfait['id'];
?>
				<tr class="nonvalide">
					<td><?php echo $date ?></td>
					<td class="libelle"><?php echo $libelle ?></td>
					<td class="montant"><?php echo $montant ?></td>
					<td><img src="<?php echo $cheminImages; ?>delete.png" onclick="choixHF(this,'A')"/></td>
					<td><a	href="index.php?uc=validerFrais&action=reporterFrais&idFrais=<?php echo $id; ?>&lstFiche=<?php echo $ficheASelectionner; ?>"
							onclick="return confirm('Voulez-vous vraiment reporter ce frais au mois suivant?');"> 
							<img src="<?php echo $cheminImages; ?>redo.png"/>
						</a>
					</td>
				
				</tr>
<?php       	
			}
?>
		</table>
		&nbsp;
		<div class="piedForm">
			<p>
				<input id="ajouter" type="submit" class="bouton" value="Valider" size="20" />
				<input id="effacer" type="button" class="bouton" value="Annuler " size="20" />
			</p> 
		</div>
		&nbsp;
	</div>
	<script type="text/javascript">
		getElementById("valeurMontant").innerHTML = <?php echo($total) ?>
	</script>
</div>
 













