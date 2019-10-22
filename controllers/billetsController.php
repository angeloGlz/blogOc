<?php
	require('models/BilletManager.php');
	require('models/Billet.php');

	function listBillets(){

		$billetsManager = new BilletManager();
		$listBillets = $billetsManager->getBillets();

		require('views/afficherListBillets.php');
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
			publierBillet();
		}
	}


	// function publication($titre, $texte, $image){
	// 	publication($titre, $texte, $image);
	// }

	function publication(Billet $billet){

		if (!empty($billet->titre()) && !empty($billet->texte())) {

			$billetManager = new BilletManager();

			$billetManager->add($billet);

			listBillets();
		}
		else{
			publierBillet();
		}
	}

	function deleteBillet($idbillet) {

		$billetManager = new BilletManager();

		$billetManager->delete($idbillet);

		listBillets();
	}


	function publierBillet(){
		require('views/publierBillet.php');
	}


	function getBillet($id){

		$billetManager = new BilletManager();
		$billet = $billetManager->getOneBillet($id);

		

		if ($billet == null || $billet == false) {
			listBillets();
		}
		else{
			$billet1 = new Billet($billet);
			require('views/editBillet.php');
		}

		
	}

	function updateBillet($idbillet, $title, $text){

		if (!empty($idbillet) && !empty($title) && !empty($text)) {
			$billetManager = new BilletManager();

			$billet = new Billet([
				'id' => $idbillet,
				'titre' => $title,
				'texte' => $text
			]);
			$billetManager->update($billet);
			//require('views/editBillet.php');
			
			listBillets();
		}

	}
	























?>