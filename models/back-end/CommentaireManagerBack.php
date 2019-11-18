<?php 

//require_once('Manager.php');
require_once('models/back-end/Manager.php');

Class CommentaireManagerBack extends Manager{

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