	<div id="sousContenu">
		<h3>Eléments forfaitisés</h3>
		<form method="POST"  action="index.php?uc=gererFrais&action=validerMajFraisForfait">
			<div class="corpsForm">
<?php
				foreach ($lesFraisForfait as $unFrais) {
					$idFrais = $unFrais['idfrais'];
					$libelle = $unFrais['libelle'];
					$quantite = $unFrais['quantite'];
?>
					<p>
						<label for="idFrais"><?php echo $libelle ?></label>
						<input type="number" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" size="5" maxlength="5" min="0" max="1000" value="<?php echo $quantite?>" >
					</p>
			
<?php
				}
?>
			</div>
			<div class="piedForm">
				<p>
					<input id="ok" type="submit" class ="bouton" value="Valider" size="20" />
					<input id="annuler" type="reset" class ="bouton" value="Effacer" size="20" />
				</p> 
			</div>
		</form>
		&nbsp;
	</div>
	
<!--
</div> -->
  