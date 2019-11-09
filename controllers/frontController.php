<?php 

require('class/Commentaire.php');
require('models/CommentaireManager.php');

function listBilletsFront(){

	$billetsManager = new BilletManager();
	$listBillets = $billetsManager->getBillets();

	require('views/frontView.php');
}

function afficherChapitre($idbillet){
	$billetsManager = new BilletManager();
	$billet = $billetsManager->getOneBillet($idbillet);

	if ($billet == null || $billet == false) {
		require('index.php');
	}
	else{
		$billet1 = $billet;

		$commentaireManager = new CommentaireManager();
		$listeComChapitre = $commentaireManager->getComChapitre($idbillet);

		if ($listeComChapitre == NULL) {
			require('views/chapitreView.php');
		}
		//var_dump($commentaireManager->getComChapitre($idbillet));
		else{
			$comChapitre = $listeComChapitre;
			require('views/chapitreView.php');
		}
		
	}

}

function getComChapitre($idbillet){
	
	
	if ($commentaireManager->getComChapitre($idbillet) != NULL) {
		$listComChapitre = $commentaireManager->getComChapitre($idbillet);
	}
}


function ajouterCom($pseudo, $texte, $idbillet){
	$commentaireManager = new CommentaireManager();
	//var_dump((int)$idbillet);
	$commentaire = new Commentaire([
		'idbillet' => $idbillet,
		'pseudo' => $pseudo,
		'commentaire' => $texte
	]);
	// var_dump($idbillet);
	// var_dump($commentaire->idbillet());
	if (empty($_SESSION['erreur_commentaire'])) {
		$commentaireManager->addCom($commentaire);
		afficherChapitre($idbillet);
	}
	else{
		//require('index.php?action=afficherChapitre&chapitre='.$idbillet);
		afficherChapitre($idbillet);
	}
}


























?>