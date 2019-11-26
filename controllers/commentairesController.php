<?php

require_once('models/CommentaireManager.php');

function getListCom(){
	$commentaireManager = new CommentaireManager();

	$listCom = $commentaireManager->getAllCom();

	require('views/back-end/commentaireView.php');
}


function designalerCom($idCom){
	$commentaireManager = new CommentaireManager();

	$commentaireManager->designalerCom($idCom);

	getListCom();
}


function signalerCommentaire($idCom, $idBillet){
	$commentaireManager = new CommentaireManager();
	
	$commentaireManager->signaler($idCom);

	checkChapitreExist($idBillet);
}


function supprimerCom($idCom){
	$commentaireManager = new CommentaireManager();

	$commentaireManager->supprimerCom($idCom);

	getListCom();

}


function getComChapitre($idbillet){
	$commentaireManager = new CommentaireManager();

	if ($commentaireManager->getComChapitre($idbillet) != NULL) {
		$listComChapitre = $commentaireManager->getComChapitre($idbillet);
	}
}


function checkComExist($idbillet, $pseudo, $commentaire){
	$commentaireManager = new CommentaireManager();

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

		afficherChapitre($commentaire->getIdBillet());
	}
	else{

		afficherChapitre($idbillet);
	}

}










?>