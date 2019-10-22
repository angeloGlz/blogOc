<?php


class Manager{

	private $_db;

	protected function dbConnect(){
		$db = new PDO('mysql:host=localhost;dbname=blog','root','12345');
		return $db;
	}
}




?>