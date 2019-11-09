
<?php

require('controllers/back-end/billetsController.php');
require('controllers/back-end/connexionController.php');
require('controllers/frontController.php');


if (isset($_GET['action']) || isset($_POST['action'])) {


	if (!empty($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		// $action = $_POST['action'];
		$action = "listBilletsFront";
	}

	if (!empty($_SESSION['pseudo'])) {
		if ($action == 'connexion') {
			listBillets();
		}

		elseif ($action == 'pageConnexion') {
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
			updateBillet(intval($_POST['idbillet']), ($_POST['title']), ($_POST['text']), ($_POST['image']), ($_FILES['newimage']));
		}

		elseif ($action == 'afficherChapitre') {
			afficherChapitre($_GET['chapitre']);
		}

		elseif ($action == 'publierCom') {
			ajouterCom($_POST['pseudo'], $_POST['commentaire'], $_POST['idBillet']);
		}

		else{
			listBillets();
		}
	}
	else{
		if($action == 'connexion'){
			connexion($_POST['pseudo'], $_POST['password']);
		} 

		elseif ($action == 'pageConnexion') {
			require('views/connexionView.php');
		} 

		elseif ($action == 'afficherChapitre') {
			afficherChapitre($_GET['chapitre']);
		}

		elseif ($action == 'listBilletsFront') {
			listBilletsFront();
		}

		elseif ($action == 'publierCom') {
			ajouterCom($_POST['pseudo'], $_POST['commentaire'], $_POST['idBillet']);
		}

		else{
			listBilletsFront();
		}
	}

}else{
	listBilletsFront();
}













?>





