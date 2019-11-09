<?php

session_start();

require('models/back-end/ConnexionManager.php');
//require('models/back-end/class/Administrator.php');


function connexion($pseudo, $mdp){
	if(!empty($pseudo) && !empty($mdp)){
		$mdp_crypte = sha1($mdp);

		$CoManager = new ConnexionManager();
		$idExist = $CoManager->checkIdCo($pseudo, $mdp_crypte);

		if ($idExist == 1) {
			//$admin = new Admin($pseudo, $mdp_crypte);
			$_SESSION['pseudo'] = $pseudo;
			//require_once('views/billetsView.php');
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