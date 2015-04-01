	<div id="menuGauche">
		<div id="infosUtil">
            <h2></h2>
			<div id="user">
				<img src="images/UserIcon.png" />
			</div>
			<div id="infos">
				<h2> <?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?> </h2>
				<h3>Visiteur médical</h3>  
			</div>
			<ul class="menuList">
				<li class="smenu">
					<a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter" >Déconnexion</a>
				</li>
			</ul>    
		</div>  
        <ul id="menuPrincipal" class="menuList">
			<li class="smenu">
				<a href="index.php?uc=accueil" title="Accueil">Accueil</a>
			</li>
			<li class="smenu">
				<a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
			</li>
			<li class="smenu">
				<a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
			</li>
        </ul>
    </div>
    