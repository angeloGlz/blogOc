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
		$db->exec('DELETE FROM billets WHERE id = '.$idbillet);
	}


	public function getBillets(){

		$db = $this->dbConnect();
		$listeBillets = [];

		$req = $db->query('SELECT * FROM billets ORDER BY titre DESC');

		while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
			$listeBillets[] = new Billet($donnees);
		}

		return $listeBillets;
	}

	public function getOneBillet($id){

		$db = $this->dbConnect();

		$req = $db->query("SELECT * FROM billets WHERE id = '".$id."'");

		$donnees = $req->fetch(PDO::FETCH_ASSOC);
		$billet = new Billet($donnees);

		return $billet;

	}

	public function checkTitleExist($title){

		$db = $this->dbConnect();

		$req = $db->query("SELECT titre FROM billets WHERE titre = '".$title."'");

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