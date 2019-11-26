<?php
	require('models/BilletManager.php');
	require('class/Billet.php');

	function listBillets(){

		$billetsManager = new BilletManager();
		$listBillets = $billetsManager->getBillets();

		require('views/back-end/billetsView.php');
	}


	function checkBillet ($titre, $texte, $image){

		$billetManager = new BilletManager();
		$nbtitle = $billetManager->checkTitleExist($titre);

		if ($nbtitle == 0) {
			$billet = new Billet([
				'titre' => $titre,
				'texte' => $texte,
				'image' => $image
			]);
			publication($billet);
		}
		else{
			$_SESSION['error_billet'] = "Le titre éxiste déja";
			publierBillet();
		}
	}

	function publication(Billet $billet){
		if (!empty($billet->titre()) && !empty($billet->texte()) && !empty($billet->image())) {

			$billetManager = new BilletManager();

			$billetManager->add($billet);
			listBillets();
		}
		else{
			if (!empty($billet->titre())) {
				$_SESSION['titre'] = $billet->titre();
			}
			if (!empty($billet->texte())) {
				$_SESSION['texte'] = $billet->texte();
			}
			if (!empty($billet->image())) {
				$_SESSION['image'] = $billet->image();
			}
			publierBillet();
		}
	}

	function deleteBillet($idbillet) {

		$billetManager = new BilletManager();

		$billetManager->delete($idbillet);

		$commentaireManager = new CommentaireManager;

		$commentaireManager->deleteAllComFromOneBillet($idbillet);

		listBillets();
	}


	function publierBillet(){
		require('views/back-end/publicationView.php');
	}


	function getBillet($id){

		$billetManager = new BilletManager();
		$billet = $billetManager->getOneBillet($id);

		

		if ($billet == null || $billet == false) {
			listBillets();
		}
		else{
			$billet1 = $billet;
			require('views/back-end/editView.php');
		}

		
	}

	function updateBillet($idbillet, $title, $text, $image, $newImage){

		if (!empty($newImage['name'])) {

			if (!empty($image)) {
				unlink('public/images/'.$image);
			}

			$billet = new Billet([
				'id' => $idbillet,
				'titre' => $title,
				'texte' => $text,
				'image' => $newImage
			]);
		}
		else{
			$billet = new Billet([
				'id' => $idbillet,
				'titre' => $title,
				'texte' => $text,
				'image' => $image
			]);
		}
		
		if (empty($_SESSION['error_billet'])) {
			
			$billetManager = new BilletManager();
			$billetManager->update($billet);
			listBillets();
		}
		else{
			getBillet($billet->id());
		}
		
		//require('views/back-end/editBillet.php');
	}
	

	function billet($idbillet){
		$billetManager = new BilletManager();
		$billet = $billetManager->getOneBillet($idbillet);

		if ($billet == false) {
			listBillets();
		}
		else{
			$billet1 = $billet;
			require('views/back-end/billetView.php');
		}
	}



	function afficherChapitre($idbillet){
		$billetsManager = new BilletManager();

		$billet = $billetsManager->getOneBillet($idbillet);

		if ($billet == false) {
			require('views/404View.php');
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
			require('views/404View.php');
		}
	}



















?>