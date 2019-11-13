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
		else{
			$comChapitre = $listeComChapitre;
			require('views/chapitreView.php');
		}
		
	}

}

function checkChapitreExist($idbillet){
	$commentaireManager = new CommentaireManager();
	if(!empty($commentaireManager->checkIdBillet($idbillet))){
		afficherChapitre($idbillet);
	}
	else{
		listBilletsFront();
	}
}

function getComChapitre($idbillet){
	$commentaireManager = new CommentaireManager();
	if ($commentaireManager->getComChapitre($idbillet) != NULL) {
		$listComChapitre = $commentaireManager->getComChapitre($idbillet);
	}
}

function checkComExist($idbillet, $pseudo, $commentaire){
	$commentaireManager = new CommentaireManager();
	var_dump($commentaireManager->checkComExist($idbillet, $pseudo, $commentaire));
	if ($commentaireManager->checkComExist($idbillet, $pseudo, $commentaire) == 0) {
		ajouterCom($pseudo, $commentaire, $idbillet);
	}
	else{
		afficherChapitre($idbillet);
	}
}

function ajouterCom($pseudo, $texte, $idbillet){
	$commentaireManager = new CommentaireManager();

	$commentaire = new Commentaire([
		'idbillet' => $idbillet,
		'pseudo' => $pseudo,
		'commentaire' => $texte
	]);

	if (empty($_SESSION['erreur_commentaire'])) {
		$commentaireManager->addCom($commentaire);
		var_dump($commentaire);
		afficherChapitre($commentaire->getIdBillet());
	}
	else{
		afficherChapitre($idbillet);
	}

}



function signalerCommentaire($idCom, $idBillet){
	$commentaireManager = new CommentaireManager();

	$commentaireManager->signaler($idCom);

	checkChapitreExist($idBillet);
}






















?>