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
				<div><?php echo $montantValide?> &#8364;</div>
			</div>
		</div>	
		<h4>Eléments forfaitisés :</h4>
		<table class="listeLegere">
			<tr>
<?php			foreach ( $lesFraisForfait as $unFraisForfait ) {
					$libelle = $unFraisForfait['libelle'];
?>					<th> <?php echo $libelle?></th>
<?php			}
?>
			</tr>
			<tr>
<?php
				foreach (  $lesFraisForfait as $unFraisForfait  ) {
					$quantite = $unFraisForfait['quantite'];
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
            </tr>
<?php      
			foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) 
			{
				$date = $unFraisHorsForfait['date'];
				$libelle = $unFraisHorsForfait['libelle'];
				$montant = $unFraisHorsForfait['montant'];
?>
				<tr>
					<td><?php echo $date ?></td>
					<td class="libelle"><?php echo $libelle ?></td>
					<td class="montant"><?php echo $montant ?></td>
				</tr>
<?php       }
?>
		</table>
		&nbsp;
	</div>
</div>
 













