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
		return $this->_image;
	}

	//SETTERS
	public function setId($id){
		$id = (int)$id;
		if (is_int($id)) {
			$this->_id = $id;
		}
		else{
			$_SESSION['error_billet'] = "Erreur";
		}
	}

	public function setTitre($titre){
		if (!empty($titre)) {
			if (is_string($titre)) {
				$this->_titre = $titre;
			}
			else{
				$_SESSION['error_billet'] = "Le titre doit etre une chaine de caractère";
			}
		}
		else{
			$_SESSION['error_billet'] = "Le titre est obligatoire";
		}
	}

	public function setTexte($texte){
		if (!empty($texte)) {
			if (is_string($texte)) {
				$this->_texte = $texte;
			}
			else{
				$_SESSION['error_billet'] = "Le texte doit etre une chaine de caractère";
			}
		}
		else{
			$_SESSION['error_billet'] = "Le texte est obligatoire";
		}
		
	}

	// public function setImage($image){

	// }


	public function setImage($image){
		if (is_string($image)) {
			$this->_image = $image;
		}
		elseif (is_array($image)) {
			if ($image['error'] == 0) {
				if (is_array($image)) {
					$extensions = array('jpg','png','jpeg','pdf');
					$fileExt = explode('.', $image['name']);
					$fileActualExt = strtolower(end($fileExt));
					if (in_array($fileActualExt, $extensions)) {
						if ($image['size'] <= 1000000) {
							$newNameFile = sha1($image['name']).".".$fileActualExt;
							$fileDestination = 'public/images/'.$newNameFile;
							move_uploaded_file($image['tmp_name'], $fileDestination);

							$this->_image = $newNameFile;
						}
						else{
							$_SESSION['error_billet'] = "le poid de l'image est superieur à celui autorisé";
						}
					}
					else{
						$_SESSION['error_billet'] = "Le fichier doit être une image";
					}
				}
			}else{
				$this->_image = NULL;
			}
		}
		
		
	}



	public function __toString(){
		return "To string par défaut : ".$this->_titre. "<br/>";
	}

}
















?>