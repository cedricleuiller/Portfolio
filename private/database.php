<?php

// Connexion à la base de données

try {
        if($_SERVER['SERVER_NAME'] === "localhost")
        {
                define("DNS", "mysql:host=localhost;dbname=portfolio;charset=utf8");
                define("ID", "root");
                define("PASSWORD", "");
        }
        else
        {
                define("DNS", "mysql:host=db706928837.db.1and1.com;dbname=db706928837;charset=utf8");
                define("ID", "dbo706928837");
                define("PASSWORD", "Complexe1!");
        }
        $pdo = new PDO(DNS,ID,PASSWORD, [PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING]);
} catch (Exception $e) {
        echo 'Impossible de se connecter à la base de données !';
        die();
}
