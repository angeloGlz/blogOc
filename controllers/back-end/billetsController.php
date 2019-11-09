<?php
	require('models/back-end/BilletManager.php');
	require('class/Billet.php');

	function listBillets(){

		$billetsManager = new BilletManager();
		$listBillets = $billetsManager->getBillets();

		require('views/back-end/billetsView.php');
	}


	function checkBillet ($titre, $texte, $image){

		$billetManager = new BilletManager();
		$nbtitle = $billetManager->checkTitleExist($titre);
		//var_dump($image);
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
		if (!empty($billet->titre()) && !empty($billet->texte())) {

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
			publierBillet();
		}
	}

	function deleteBillet($idbillet) {

		$billetManager = new BilletManager();

		$billetManager->delete($idbillet);

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
		
		//require('views/editBillet.php');
	}
	























?>