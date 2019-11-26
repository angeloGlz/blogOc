<?php

require('Manager.php');

class BilletManager extends Manager{

	public function add(Billet $billet){

		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO billets (titre, texte, image) VALUES (:titre, :texte, :image)');

		$req->bindValue(':titre', $billet->titre());
		$req->bindValue(':texte', $billet->texte());
		$req->bindValue(':image', $billet->image());

		$req->execute();

	}

	public function delete($idbillet){
		$db = $this->dbConnect();

		$req = $db->prepare('DELETE FROM billets WHERE id = :idbillet ');

		$req->bindValue('idbillet', $idbillet);

		$req->execute();
	}


	public function getBillets(){

		$db = $this->dbConnect();
		$listeBillets = [];

		$req = $db->query('SELECT * FROM billets ORDER BY `date` ');

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
			$listeBillets[] = new Billet($donnees);
		}

		return $listeBillets;
	}

	public function getOneBillet($id){

		$db = $this->dbConnect();

		$req = $db->prepare('SELECT * FROM billets WHERE id = :id');

		$req->bindValue(':id', $id);

		$req->execute();

		$donnees = $req->fetch(PDO::FETCH_ASSOC);
		if ($donnees != false) {
			$billet = new Billet($donnees);
			return $billet;
		}
		else{
			return false;
		}
		
		//var_dump($billet);
		

	}

	public function checkTitleExist($titre){

		$db = $this->dbConnect();

		$req = $db->prepare('SELECT titre FROM billets WHERE titre = :titre');

		$req->bindValue(':titre', $titre);

		$req->execute();

		$nbTitle = $req->rowCount();

		return $nbTitle;
	}

	public function update(Billet $billet){

		$db = $this->dbConnect();
		
		$req = $db->prepare("UPDATE billets SET titre = :titre, texte = :texte, image = :image WHERE id = :id");

		$req->bindValue(':id', $billet->id());
		$req->bindValue(':titre', $billet->titre());
		$req->bindValue(':texte', $billet->texte());
		$req->bindValue(':image', $billet->image());

		$req->execute();
	}


}



?>