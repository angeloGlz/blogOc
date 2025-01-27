<?php

require_once('models/Manager.php');


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

		$req = $db->prepare('SELECT * FROM billets WHERE id = :idbillet');

		$req->bindValue(':idbillet', $idbillet);

		return $req->execute();
	}


	public function getComChapitre($idbillet){
		$db = $this->dbConnect();
		$listeComChapitre = [];

		$req = $db->prepare("SELECT id, idbillet, commentaire, pseudo, signaler, DATE_FORMAT(date, '%d/%m/%Y %Hh%i') AS date FROM commentaires WHERE idbillet = :idbillet");

		$req->bindValue(':idbillet', $idbillet);

		$req->execute();

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC)){
			$listeComChapitre[] = new Commentaire($donnees);
		}
		return $listeComChapitre;
	}


	public function signaler($idcom){
		$db = $this->dbConnect();

		$req = $db->prepare("UPDATE commentaires SET signaler = :signaler WHERE id = :idcom");

		$req->bindValue(':signaler', 1);
		$req->bindValue(':idcom', $idcom);

		$req->execute();

	}


	public function checkComExist($idbillet, $pseudo, $commentaire){
		$db = $this->dbConnect();

		$req = $db->prepare("SELECT * FROM commentaires WHERE idbillet = :idbillet AND commentaire = :commentaire AND pseudo = :pseudo");

		$req->bindValue('idbillet', $idbillet);
		$req->bindValue('commentaire', $commentaire);
		$req->bindValue('pseudo', $pseudo);

		$req->execute();

		$donnees = $req->rowCount();	

		return $donnees;
	}

	public function deleteAllComFromOneBillet($idbillet){

		$db = $this->dbConnect();

		$db->exec('DELETE FROM commentaires WHERE idbillet ='. $idbillet);

	}


	public function getAllCom(){
		$db = $this->dbConnect();
		$listCom = [];
		$req = $db->query("SELECT * FROM commentaires ORDER BY signaler");


		while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
			$listCom[] = new Commentaire($donnees);
		}

		return $listCom;
	}

	public function supprimerCom($idCom){
		$db = $this->dbConnect();

		$req = $db->prepare('DELETE FROM commentaires WHERE id = :idCom');

		$req->bindValue(':idCom', $idCom);

		$req->execute();
	}

	public function designalerCom($idCom){
		$db = $this->dbConnect();

		$req = $db->prepare('UPDATE commentaires SET signaler = :signaler WHERE id = :idCom ');

		$req->bindValue(':signaler', 0);
		$req->bindValue(':idCom', $idCom);

		$req->execute();

	}

}












?>