<?php
class Users
{
	//Propriétés
	private $id;
	private $username;
	private $password;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	//Méthodes
	//Get
	public function getId()
	{
		return $this->id;
	}
	public function getUsername()
	{
		return $this->username;
	}
	public function getPassword()
	{
		return $this->password;
	}

        public function verifPassword($password)
	{
		return password_verify($password, $this->password);
	}
}
?>
