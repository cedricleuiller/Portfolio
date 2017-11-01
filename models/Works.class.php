<?php
class Works
{
        //Propriéré
        private $id;
        private $screen;
        private $name;
        private $url;
        private $content;
        private $id_category;

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

        public function getScreen()
	{
		return $this->screen;
	}

        public function getName()
	{
		return $this->name;
	}

        public function getUrl()
	{
		return $this->url;
	}

        public function getContent()
	{
		return $this->content;
	}

        public function getIdCategory()
	{
		return $this->id_category;
	}
}
