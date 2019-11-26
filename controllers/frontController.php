<?php 

require('class/Commentaire.php');
require_once('models/CommentaireManager.php');

function listBilletsFront(){

	$billetsManager = new BilletManager();

	$listBillets = $billetsManager->getBillets();

	require('views/frontView.php');
}

























?>