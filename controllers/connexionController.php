<?php

session_start();

require('models/ConnexionManager.php');


function connexion($pseudo, $mdp){
	if(!empty($pseudo) && !empty($mdp)){
		$mdp_crypte = sha1($mdp);

		$CoManager = new ConnexionManager();
		$idExist = $CoManager->checkIdCo($pseudo, $mdp_crypte);

		if ($idExist == 1) {
			$_SESSION['pseudo'] = $pseudo;
			listBillets();
		}
		else{
			$_SESSION['error_co'] = "identifiant ou mot de passe incorrect";
			require('views/connexionView.php');
		}
	}
	else{
		$_SESSION['error_co'] = "Tous les champs doivent être rempli";
		require('views/connexionView.php');
	}
}


















?>