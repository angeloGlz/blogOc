<?php

require_once('models/back-end/Manager.php');


Class CommentaireManager extends Manager{

	public function addCom(Commentaire $commentaire){
		$db = $this->dbConnect();

		$req = $db->prepare('INSERT INTO commentaires (idbillet, commentaire, pseudo,  signaler) VALUES (:idbillet, :commentaire, :pseudo, :signaler)');

		$req->bindValue(':idbillet', $commentaire->getIdBillet());
		$req->bindValue(':pseudo', $commentaire->getPseudo());
		$req->bindValue(':commentaire', $commentaire->getCommentaire());
		$req->bindValue(':signaler', $commentaire->getSignaler());

		$req->execute();
	}


	public function checkIdBillet($idbillet){
		$db = $this->dbConnect();

		$req = $db->query("SELECT * FROM billets WHERE id ='".$idbillet."'");

		$donnees = $req->fetch(PDO::FETCH_ASSOC);

		return $donnees;

	}


	public function getComChapitre($idbillet){
		$db = $this->dbConnect();
		$listeComChapitre = [];

		$req = $db->query("SELECT * FROM commentaires WHERE idbillet ='".$idbillet."'");

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC)){
			$listeComChapitre[] = new Commentaire($donnees);
		}
		return $listeComChapitre;
	}


	public function signaler($idcom){
		$db = $this->dbConnect();

		$req = $db->prepare("UPDATE commentaires SET signaler = :signaler WHERE id ='".$idcom."'");

		$req->bindValue(':signaler', 1);

		$req->execute();

	}


	public function checkComExist($idbillet, $pseudo, $commentaire){
		$db = $this->dbConnect();

		$req = $db->query("SELECT * FROM commentaires WHERE idbillet = '". $idbillet ."' AND commentaire ='". $commentaire ."' AND pseudo = '". $pseudo."'");

		$donnees = $req->rowCount();

		return $donnees;

	}



}












?>