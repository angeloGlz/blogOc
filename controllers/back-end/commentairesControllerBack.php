<?php

require('models/back-end/CommentaireManagerBack.php');

function getListCom(){
	$commentaireManager = new CommentaireManagerBack();

	$listCom = $commentaireManager->getAllCom();

	require('views/back-end/commentaireView.php');
}


function designalerCom($idCom){
	$commentaireManager = new CommentaireManagerBack();

	$commentaireManager->designalerCom($idCom);

	getListCom();
}

function supprimerCom($idCom){
	$commentaireManager = new CommentaireManagerBack();

	$commentaireManager->supprimerCom($idCom);

	getListCom();

}






?>