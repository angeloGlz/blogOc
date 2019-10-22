
<?php

require('controllers/billetsController.php');

if (isset($_GET['action']) || isset($_POST['action'])) {

	if (!empty($_GET['action'])) {
		$action = $_GET['action'];
	} else {
		$action = $_POST['action'];
	}
	
	if ($action == 'listBillets') {
		listBillets();
	}

	elseif ($action == 'publierBillet') {
		publierBillet();
	}

	elseif ($action == 'checkBillet') {
		checkBillet($_POST['titre'], $_POST['texte'], $_FILES['image']);

		//publication($_POST['titre'], $_POST['texte']);
	}

	elseif ($action == 'delete') {
		deleteBillet(intval($_POST['idbillet']));
	}

	elseif ($action == 'edit'){
		getBillet(intval($_POST['idbillet']));
	}

	elseif ($action == 'saveEdit'){
		updateBillet(intval($_POST['idbillet']), ($_POST['title']), ($_POST['text']));
	}

	else{
		listBillets();
	}

}else{
	listBillets();
}













?>





