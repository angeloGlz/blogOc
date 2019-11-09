<?php

require_once('models/back-end/Manager.php');


Class CommentaireManager extends Manager{

	public function addCom(Commentaire $commentaire){
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO commentaires (idbillet, commentaire, pseudo, signaler) VALUES (:idbillet, :pseudo, :commentaire, :signaler)');

		//var_dump($commentaire->idbillet());

		$req->bindValue(':idbillet', $commentaire->getIdBillet());
		$req->bindValue(':pseudo', $commentaire->getPseudo());
		$req->bindValue(':commentaire', $commentaire->getCommentaire());
		$req->bindValue(':signaler', $commentaire->getSignaler());

		$req->execute();
	}


	public function getComChapitre($idbillet){
		$db = $this->dbConnect();
		$listeComChapitre = [];

		$req = $db->query("SELECT * FROM commentaires WHERE idbillet ='".$idbillet."'");

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC)){
			$listeComChapitre[] = new Commentaire($donnees);
		}
		// var_dump($listeComChapitre);
		return $listeComChapitre;
	}



}












?>