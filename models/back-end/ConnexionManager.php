<?php


require_once('Manager.php');


Class ConnexionManager extends Manager{

	public function checkIdCo($pseudo, $mdp_crypte){
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM administrateur WHERE pseudo = :pseudo AND mdp_crypte = :mdp_crypte');

		$req->bindValue(':pseudo', $pseudo);
		$req->bindValue(':mdp_crypte', $mdp_crypte);

		$req->execute();

		$nbCo = $req->rowCount();

		return $nbCo;
	} 

}
































?>