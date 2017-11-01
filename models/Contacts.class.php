<?php
class Contacts
{
        //Propriétés
        private $name;
        private $mail;
        private $content;

        public function __construct($pdo)
        {
                $this->pdo = $pdo;
        }

        //Méthodes
	//Get
	public function getName()
	{
		return $this->name;
	}
	public function getMail()
	{
		return $this->mail;
	}
	public function getContent()
	{
		return $this->content;
	}
}
