
<?php

require('controllers/billetsController.php');
require('controllers/connexionController.php');
require('controllers/commentairesController.php');
require('controllers/frontController.php');


//Chaque action fait sur le site fera passer une variable GET nomé action
//En fonction de cette action on appelera la fonction souhaité d'un controlleur.


if (isset($_GET['action'])) {


	if (!empty($_GET['action'])) {
		$action = htmlspecialchars($_GET['action']);
	} else {
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

		elseif ($action == 'page_billet') {
			billet(htmlspecialchars($_GET['billet']));
		}

		elseif ($action == 'verification_billet') {
			if (!empty($_POST['titre']) && !empty($_POST['texte']) && !empty($_FILES['image'])) {
				checkBillet(htmlspecialchars($_POST['titre']), htmlspecialchars($_POST['texte']), $_FILES['image']);
			}	
			else{
				listBillets();
			}
		}

		elseif ($action == 'supprimer_billet') {
			if (!empty($_POST['idbillet'])) {
				deleteBillet(intval(htmlspecialchars($_POST['idbillet'])));
			}
			else{
				listBillets();
			}
			
		}

		elseif ($action == 'editer_billet'){
			if (!empty($_POST['idbillet'])) {
				getBillet(intval(htmlspecialchars($_POST['idbillet'])));
			}
			else{
				listBillets();
			}
			
		}

		elseif ($action == 'sauvegarder_edition_billet'){
			updateBillet(intval(htmlspecialchars($_POST['idbillet'])), (htmlspecialchars($_POST['title'])), (htmlspecialchars($_POST['text'])), (htmlspecialchars($_POST['image'])), ($_FILES['newimage']));
		}

		elseif ($action == 'afficherChapitre') {
			if (!empty($_GET['chapitre'])) {
				checkChapitreExist(htmlspecialchars($_GET['chapitre']));
			}
			else{
				listBilletsFront();
			}
		}

		elseif ($action == 'signalerCommentaire') {
			if (!empty($_GET['commentaire']) && !empty($_GET['billet'])) {
				signalerCommentaire(htmlspecialchars($_GET['commentaire']), htmlspecialchars($_GET['billet']));
			}
			else{
				listBilletsFront();
			}
		}

		elseif ($action == 'checkComExist') {
			if (!empty($_POST['idBillet']) && !empty($_POST['pseudo']) && !empty($_POST['commentaire'])) {
				checkComExist(htmlspecialchars($_POST['idBillet']), htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['commentaire']));
			}
			else{
				listBilletsFront();
			}
			
		}

		elseif ($action == 'designalerCommentaire') {
			if (!empty($_POST['idCom'])) {
				designalerCom(htmlspecialchars($_POST['idCom']));
			}
			else{
				listBilletsFront();
			}
		}

		elseif ($action == 'supprimerCommentaire') {
			if (!empty($_POST['idCom'])) {
				supprimerCom(htmlspecialchars($_POST['idCom']));
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
				connexion(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['password']));
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
				checkChapitreExist(htmlspecialchars($_GET['chapitre']));
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
				checkComExist(htmlspecialchars($_POST['idBillet']), htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['commentaire']));
			}
			else{
				listBilletsFront();
			}
			
		}

		elseif ($action == 'signalerCommentaire') {
			if (!empty($_GET['commentaire']) && !empty($_GET['billet'])) {
				signalerCommentaire(htmlspecialchars($_GET['commentaire']), htmlspecialchars($_GET['billet']));
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





