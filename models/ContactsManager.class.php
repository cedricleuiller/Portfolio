<?php
class ContactsManager
{
        private $pdo;

        public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

        public function newContact($name, $mail, $content){
                $request = "INSERT INTO `contact_mail`(`name`,`mail`,`content`) VALUES (?, ?, ?)";
                $query = $this->pdo->prepare($request);
                $query->execute([$name , $mail, $content]);
        }

        public function findAll()
        {
                $request = "SELECT * FROM contact_mail";
                $query = $this->pdo->query($request);
                $works = $query->fetchAll(PDO::FETCH_ASSOC);
                return $works;
        }

        public function findByName($name)
	{
		$request = "SELECT * FROM contact_mail WHERE name='".$name."'";
		$query = $this->pdo->query($resquest);
		$name = $query->fetchAll();
		return $name;
	}

        public function findByMail($mail)
	{
		$request = "SELECT * FROM contact_mail WHERE mail='".$mail."'";
		$query = $this->pdo->query($resquest);
		$mail = $query->fetchAll();
		return $mail;
	}

        public function findByContent($content)
	{
		$request = "SELECT * FROM contact_mail WHERE content LIKE '%".$content."%'";
		$query = $this->pdo->query($resquest);
		$content = $query->fetchAll();
		return $content;
	}
}
