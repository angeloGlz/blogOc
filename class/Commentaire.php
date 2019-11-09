<?php

Class Commentaire{

	private $_id;
	private $_idBillet;
	private $_pseudo;
	private $_commentaire;
	private $_date;
	private $_signaler = 0;


	public function __construct(array $contenu){
		$this->hydrate($contenu);
	}

	public function hydrate(array $contenu){
		foreach ($contenu as $key => $value) {
			
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method)) {
				$this->$method($value);
			}
		}
	}

	//GETTERS
	public function getId(){
		return $this->_id;
	}

	public function getIdBillet(){
		return $this->_idBillet;
	}

	public function getPseudo(){
		return $this->_pseudo;
	}

	public function getCommentaire(){
		return $this->_commentaire;
	}

	public function getDate(){
		return $this->_date;
	}

	public function getSignaler(){
		return $this->_signaler;
	}



	//SETTERS
	public function setId($id){
		$id = (int)$id;
		if (is_int($id)) {
			$this->_id = $id;
		}
	}

	public function setIdBillet($idbillet){
		$idbillet = (int)$idbillet;
		if (is_int($idbillet)) {
			$this->_idBillet = $idbillet;
		}
	}

	public function setPseudo($pseudo){
		if (is_string($pseudo)) {
			if (strlen($pseudo) <= 30) {
				$this->_pseudo = $pseudo;
			}
			else{
				$_SESSION['erreur_commentaire'] = "Le pseudo ne doit pas contenir plus de 30 caractères";
			}
		}
		else{
			$_SESSION['erreur_commentaire'] = "Une erreur est survenue";
		}
	}

	public function setCommentaire($commentaire){
		if (is_string($commentaire)) {
			if (strlen($commentaire) <= 500) {
				$this->_commentaire = $commentaire;
			}
			else{
				$_SESSION['erreur_commentaire'] = "Le commentaire ne doit pas contenir plus de 500 caractères";
			}
		}
		else{
			$_SESSION['erreur_commentaire'] = "Une erreur est survenue";
		}
	}

	public function setDate($date){
		$this->_date = $date;
	}

	public function setSignaler($signalement){
		$signalement = (int)$signalement;
		if (is_int($signalement)) {
			$this->_signaler = $signalement;
		}
		else{
			$_SESSION['erreur_commentaire'] = "Une erreur est survenue";
		}
	}


}




?>