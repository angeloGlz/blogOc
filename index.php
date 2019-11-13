
<?php

require('controllers/back-end/billetsController.php');
require('controllers/back-end/connexionController.php');
require('controllers/back-end/commentairesControllerBack.php');
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

		elseif ($action == 'listCommentaires') {
			getListCom();
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
			checkChapitreExist($_GET['chapitre']);
		}

		elseif ($action == 'signalerCommentaire') {
			signalerCommentaire($_GET['commentaire']);
		}

		elseif ($action == 'checkComExist') {
			checkComExist($_POST['pseudo'], $_POST['commentaire'], $_POST['idBillet']);
		}

		elseif ($action == 'designalerCommentaire') {
			designalerCom($_POST['idCom']);
		}

		elseif ($action == 'supprimerCommentaire') {
			//var_dump($_POST['idCom']);
			if (!empty($_POST['idCom'])) {
				supprimerCom($_POST['idCom']);
			}
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
			if (!empty($_GET['chapitre'])) {
				checkChapitreExist($_GET['chapitre']);
			}
			else{
				listBilletsFront();
			}
			
		}

		elseif ($action == 'listBilletsFront') {
			listBilletsFront();
		}

		elseif ($action == 'checkComExist') {
			if (!empty($_POST['idBillet']) && !empty($_POST['pseudo']) && !empty($_POST['commentaire'])) {
				checkComExist($_POST['idBillet'], $_POST['pseudo'], $_POST['commentaire']);
			}
			else{
				//var_dump($_POST['idBillet'], $_POST['pseuod'], $_POST['commentaire']);
				listBilletsFront();
			}
			
		}

		elseif ($action == 'signalerCommentaire') {
			if (!empty($_GET['commentaire'] && !empty($_GET['billet']))) {
				signalerCommentaire($_GET['commentaire'], $_GET['billet']);
			}
			else{
				listBilletsFront();
			}
		}

		else{
			listBilletsFront();
		}
	}

}else{
	listBilletsFront();
}













?>





