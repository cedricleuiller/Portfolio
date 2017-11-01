<?php

class WorksManager
{
        private $pdo;

        public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

        function addWork($screen, $name, $url, $content, $id_category)
        {
                $request = "INSERT INTO `works`(`screen`, `name`,`url`, `content`, `id_category`) VALUES (?, ?, ?, ?, ?)";
                $query = $this->pdo->prepare($request);
                $query->execute([$screen, $name, $url, $content, $id_category]);
        }

        function selectCategory()
        {
                $request = "SELECT * FROM `categories`";
                $query = $this->pdo->query($request);
                $category = $query->fetchAll(PDO::FETCH_ASSOC);
                return $category;
        }

        public function findById($id)
	{
		$id = intval($id);
		$request = "SELECT * FROM works WHERE id='".$id."'";
		$query = $this->pdo->query($resquest);
		$user = $query->fetchAll();
		return $user;
	}

        public function findAll()
	{
                $request = "SELECT * FROM works";
                $query = $this->pdo->query($request);
                if ($query != false) {
                        $works = $query->fetchAll(PDO::FETCH_ASSOC);
                        return $works;
                }
                return false;


	}

        public function findByScreen($screen)
	{
		$request = "SELECT * FROM works WHERE screen LIKE '%".$screen."%'";
		$query = $this->pdo->prepare($request);
                $query->bindParam('screen', $screen, PDO::PARAM_STR);
		$query->execute();
		$screen = $query->fetchObject("Works", [$this->pdo]);
		return $screen;
	}

        public function findByName($name)
	{
		$request = "SELECT * FROM works WHERE name = :name";
		$query = $this->pdo->prepare($request);
                $query->bindParam('name', $name, PDO::PARAM_STR);
		$query->execute();
		$name = $query->fetchObject("Works", [$this->pdo]);
		return $name;
	}

        public function findByUrl($url)
	{
		$request = "SELECT * FROM works WHERE url = :url";
		$query = $this->pdo->prepare($request);
                $query->bindParam('url', $url, PDO::PARAM_STR);
		$query->execute();
		$url = $query->fetchObject("Works", [$this->pdo]);
		return $url;
	}

        public function findByContent($content)
	{
		$request = "SELECT * FROM works WHERE content = :content";
		$query = $this->pdo->prepare($request);
                $query->bindParam('content', $content, PDO::PARAM_STR);
		$query->execute();
		$content = $query->fetchObject("Works", [$this->pdo]);
		return $content;
	}

        public function findByIdCategory($id_category)
	{
		$request = "SELECT * FROM works WHERE id_category = :id_category";
		$query = $this->pdo->prepare($request);
                $query->bindParam('id_category', $id_category, PDO::PARAM_STR);
		$query->execute();
		$id_category = $query->fetchObject("Works", [$this->pdo]);
		return $id_category;
	}
}
