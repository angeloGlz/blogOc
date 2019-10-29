
<?php

require('controllers/back-end/billetsController.php');
require('controllers/back-end/connexionController.php');

if (isset($_GET['action']) || isset($_POST['action'])) {


	if (!empty($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = $_POST['action'];
	}

	if($action == 'connexion'){
		connexion($_POST['pseudo'], $_POST['password']);
	} 
	else {
		if ($action == 'pageConnexion') {
			if (empty($_SESSION['pseudo'])) {
				require('views/connexionView.php');
			}
		} 
		else {
			if (empty($_SESSION['pseudo'])) {
				require('views/frontView.php');
			}
		}
	}

	if (!empty($_SESSION['pseudo'])) {
		if ($action == 'connexion') {
			listBillets();
		}

		elseif ($action == 'listBillets') {
			listBillets();
		}

		elseif ($action == 'publierBillet') {
			publierBillet();
		}

		elseif ($action == 'checkBillet') {
			checkBillet($_POST['titre'], $_POST['texte'], $_FILES['image']);
		}

		elseif ($action == 'delete') {
			deleteBillet(intval($_POST['idbillet']));
		}

		elseif ($action == 'edit'){
			getBillet(intval($_POST['idbillet']));
		}

		elseif ($action == 'saveEdit'){
			updateBillet(intval($_POST['idbillet']), ($_POST['title']), ($_POST['text']));
		}

		else{
			listBillets();
		}
	}
	


}else{
	require('views/frontView.php');
}













?>





