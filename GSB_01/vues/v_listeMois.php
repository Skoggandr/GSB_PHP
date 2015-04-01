	<div id="sousContenu">
		<h3>Mois à sélectionner : </h3>
		<form action="index.php?uc=etatFrais&action=voirEtatFrais" method="post">
			<div class="corpsForm">
				<p>
					<label for="lstMois" accesskey="n">Mois : </label>
					<select id="lstMois" name="lstMois" title="Sélectionnez le mois souhaité pour la fiche de frais">
<?php
						foreach ($lesMois as $unMois)
						{	
							$mois = $unMois['mois'];
							$numAnnee =  $unMois['numAnnee'];
							$numMois =  $unMois['numMois'];
							$selected = ($mois == $moisASelectionner)?("selected"):("");
?>							<option <?php echo $selected ?> value="<?php echo $mois ?>"><?php echo  obtenirLibelleMois($numMois) . " " . $numAnnee ?> </option>
<?php					}
?>    
					</select>
				</p>
			</div>
			<div class="piedForm">
				<p>
					<input id="ok" type="submit" class="bouton" value="Valider" size="20" />
					<input id="annuler" type="reset" class="bouton" value="Effacer" size="20" />
				</p> 
			</div>     
		</form>
	</div>
