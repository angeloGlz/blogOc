<?php


require_once('Manager.php');


Class ConnexionManager extends Manager{

	public function checkIdCo($pseudo, $mdp_crypte){
		$db = $this->dbConnect();
		$req = $db->query("SELECT * FROM administrateur WHERE pseudo = '".$pseudo."' AND mdp_crypte = '".$mdp_crypte."'");
		$req2 = $db->exec("INSERT INTO logs (`text`) VALUES ('connexion')");
		$nbCo = $req->rowCount();

		return $nbCo;
	} 

}
































?>