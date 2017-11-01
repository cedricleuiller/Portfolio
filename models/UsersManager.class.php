<?php

class UsersManager
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function findById($id)
	{
		$id = intval($id);
		$request = "SELECT * FROM users WHERE id='".$id."'";
		$query = $this->pdo->query($resquest);
		$user = $query->fetchAll();
		return $user;
	}

	public function findAll()
	{
                $request = "SELECT * FROM users";
                $query = $this->pdo->query($request);
                $users = $query->fetchAll(PDO::FETCH_ASSOC);
                return $users;

	}

        public function findByUsername($username)
	{
		$request = "SELECT * FROM users WHERE username = :username OR email = :username";
		$query = $this->pdo->prepare($request);
                $query->bindParam(':username', $username, PDO::PARAM_STR);
		$query->execute();
		$user = $query->fetchObject("Users", [$this->pdo]);
		return $user;
	}

}
