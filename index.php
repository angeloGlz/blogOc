
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

		elseif ($action == 'page_connexion') {
			listBillets();
		} 

		elseif ($action == 'page_liste_billets') {
			listBillets();
		}

		elseif ($action == 'page_liste_commentaires') {
			getListCom();
		}

		elseif ($action == 'page_publier_billet') {
			publierBillet();
		}

		elseif ($action == 'verification_billet') {
			if (!empty($_POST['titre']) && !empty($_POST['texte']) && !empty($_FILES['image'])) {
				checkBillet($_POST['titre'], $_POST['texte'], $_FILES['image']);
			}	
			else{
				listBillets();
			}
		}

		elseif ($action == 'supprimer_billet') {
			if (!empty($_POST['idbillet'])) {
				deleteBillet(intval($_POST['idbillet']));
			}
			else{
				listBillets();
			}
			
		}

		elseif ($action == 'editer_billet'){
			if (!empty($_POST['idbillet'])) {
				getBillet(intval($_POST['idbillet']));
			}
			else{
				listBillets();
			}
			
		}

		elseif ($action == 'sauvegarder_edition_billet'){
			updateBillet(intval($_POST['idbillet']), ($_POST['title']), ($_POST['text']), ($_POST['image']), ($_FILES['newimage']));
		}

		elseif ($action == 'afficherChapitre') {
			if (!empty($_GET['chapitre'])) {
				checkChapitreExist($_GET['chapitre']);
			}
			else{
				listBilletsFront();
			}
		}

		elseif ($action == 'signalerCommentaire') {
			if (!empty($_GET['commentaire']) && !empty($_GET['billet'])) {
				signalerCommentaire($_GET['commentaire'], $_GET['billet']);
			}
			else{
				listBilletsFront();
			}
		}

		elseif ($action == 'checkComExist') {
			if (!empty($_POST['idBillet']) && !empty($_POST['pseudo']) && !empty($_POST['commentaire'])) {
				checkComExist($_POST['idBillet'], $_POST['pseudo'], $_POST['commentaire']);
			}
			else{
				listBilletsFront();
			}
			
		}

		elseif ($action == 'designalerCommentaire') {
			if (!empty($_POST['idCom'])) {
				designalerCom($_POST['idCom']);
			}
			else{
				listBilletsFront();
			}
		}

		elseif ($action == 'supprimerCommentaire') {
			if (!empty($_POST['idCom'])) {
				supprimerCom($_POST['idCom']);
			}
			else{
				listBillets();
			}
		}

		else{
			listBillets();
		}
	}
	else{
		if($action == 'connexion'){
			if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
				connexion($_POST['pseudo'], $_POST['password']);
			}
			else{
				$_SESSION['error_co'] = "Un champ n'a pas été rempli";
				require('views/connexionView.php');
			}
		} 

		elseif ($action == 'page_connexion') {
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
				listBilletsFront();
			}
			
		}

		elseif ($action == 'signalerCommentaire') {
			if (!empty($_GET['commentaire']) && !empty($_GET['billet'])) {
				signalerCommentaire($_GET['commentaire'], $_GET['billet']);
			}
			else{
				listBilletsFront();
			}
		}

		else{
			require('views/404View.php');
		}
	}

}else{
	listBilletsFront();
}













?>





