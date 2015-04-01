<!--
<div id="contenu"> -->
	<div id="sousContenu">
		<h3>Eléments hors forfait</h3>
		<h4>Descriptif des éléments hors forfait</h3>
		<table class="listeLegere">
            <tr>
				<th class="date">Date</th>
				<th class="libelle">Libellé</th>  
                <th class="montant">Montant</th>
				<th class="action">&nbsp;</th>                
            </tr>
<?php    
			foreach( $lesFraisHorsForfait as $unFraisHorsForfait) {
				$libelle = $unFraisHorsForfait['libelle'];
				$date = $unFraisHorsForfait['date'];
				$montant=$unFraisHorsForfait['montant'];
				$id = $unFraisHorsForfait['id'];
?>		
				<tr>
					<td><?php echo $date ?></td>
					<td class="libelle"><?php echo $libelle ?></td>
					<td class="montant"><?php echo $montant ?></td>
					<td>
						<a 	href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php echo $id ?>" 
							onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');"><img src="images/icon-supprimer.png" />
						</a>
					</td>
				</tr>
<?php		 
			}
?>	  
		</table>
		<form action="index.php?uc=gererFrais&action=validerCreationFrais" method="post">
			<div class="corpsForm">
				<h4>Nouvel élément hors forfait</h3>
				<p>
					<label for="txtDateHF">Date (jj/mm/aaaa) : </label>
					<input type="date" id="txtDateHF" name="dateFrais" size="10" maxlength="10" value=""  />
				</p>
				<p>
					<label for="txtLibelleHF">Libellé :</label>
					<input type="text" id="txtLibelleHF" name="libelle" size="50" maxlength="256" value="" />
				</p>
				<p>
					<label for="txtMontantHF">Montant : </label>
					<input type="text" id="txtMontantHF" name="montant" size="10" maxlength="10" value="" />
				</p>
			</div>
			<div class="piedForm">
				<p>
					<input id="ajouter" type="submit" class="bouton" value="Ajouter" size="20" />
					<input id="effacer" type="reset" class="bouton" value="Effacer" size="20" />
				</p> 
			</div>
		</form>
	</div>
</div>
  

