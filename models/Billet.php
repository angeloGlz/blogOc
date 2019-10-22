<?php

class Billet {

	private $_id;
	private $_titre;
	private $_texte;
	private $_image;

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
	public function id(){
		return $this->_id;
	}

	public function titre(){
		return htmlspecialchars_decode($this->_titre);
	}

	public function texte(){
		return htmlspecialchars_decode($this->_texte);
	}

	public function image(){
		//var_dump($this->_image);
		return htmlspecialchars($this->_image);
	}

	//SETTERS
	public function setId($id){
		$id = (int)$id;
		if (is_int($id)) {
			$this->_id = $id;
		}
		else{
			trigger_error("l'\id n'est pas un entier", E_USER_WARNING);
		}
	}

	public function setTitre($titre){
		if (is_string($titre)) {
			$this->_titre = $titre;
		}
		else{
			trigger_error("le titre n'\est pas une chaine de caractère", E_USER_WARNING);
		}
	}

	public function setTexte($texte){
		if (is_string($texte)) {
			$this->_texte = $texte;
		}
		else{
			trigger_error("le texte n'\est pas une chaine de caractère", E_USER_WARNING);
		}
	}

	public function setImage($image){
		
		if (is_array($image)) {
			$extensions = array('jpg','png','jpeg','pdf');
			$fileExt = explode('.', $image['name']);
			$fileActualExt = strtolower(end($fileExt));
			if (in_array($fileActualExt, $extensions)) {
				if ($image['error'] == 0) {
					if ($image['size'] <= 1000000) {
						$newNameFile = sha1($image['name']).".".$fileActualExt;
						$fileDestination = 'public/images/'.$newNameFile;
						move_uploaded_file($image['tmp_name'], $fileDestination);

						$this->_image = $newNameFile;
					}
					else{
						$this->_image = null;
						trigger_error("le texte n'\est pas une chaine de caractère", E_USER_WARNING);
					}
				}
				else{
					$this->_image = null;
					trigger_error("le texte n'\est pas une chaine de caractère", E_USER_WARNING);
				}
			}
			else{
				$this->_image = null;
				trigger_error("extension non autorisé", E_USER_WARNING);
			}
		}
		else{
			if (is_string($image)) {
				$this->_image = $image;	
			}
		}
		
	}



	public function __toString(){
		return "To string par défaut : ".$this->_titre. "<br/>";
	}

}
















?>