<?php
session_start();

// Initialisation des valeurs de description du site

switch ($_SERVER['QUERY_STRING']) {
        case 'page=home':
                $description = 'Accueil __ Site personnel de Cédric Leuiller, développeur front & back !';
        break;

        case 'page=competences':
                $description = 'Page des compétences __ Site personnel de Cédric Leuiller, développeur front & back !';
        break;

        case 'page=works':
                $description = 'Page des réalisations __ Site personnel de Cédric Leuiller, développeur front & back !';
        break;

        case 'page=contact':
                $description = 'Formulaire pour me contacter __ Site personnel de Cédric Leuiller, développeur front & back !';
        break;

        default:
                $description = 'Accueil __ Site personnel de Cédric Leuiller, développeur front & back !';
        break;
}

// Initialisation des valeurs du titre

if (isset($_SESSION['admin'])) {
        $title = "BackOffice du portfolio !";
} else {
        $title = "Portfolio de Cédric Leuiller !";
}

// initialisation du cookie pour le script d'arrivée sur le site.
if (!isset($_COOKIE['firstConnexion']) && !isset($_GET['admin'])) {
        setcookie('firstConnexion', "welcome", time() +900, null, null, false, true);
        require 'views/welcome.phtml';
} else {

        require_once 'private/database.php';

        function __autoload($className){
                require 'models/'.$className.'.class.php';
        }

        // On définit la page d'accueil
        $sPage = "home";

        // On définit les pages selon les accès de session
        $access = ["competences", "works", "contact", "admin", "legalInformations", "welcome"];
        $accessAdmin = ["competences", "works", "contact", "admin", "legalInformations", "welcome", "newWork", "mailList", "logout"];

        if(isset($_GET['page'])){
                if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1 && in_array($_GET['page'], $accessAdmin)){
                        $sPage = $_GET['page'];
                }
                else if (in_array($_GET['page'], $access)){
                        $sPage = $_GET['page'];
                }
        }

        // les traitements communiquent avec les objets, on s'en sert lors des requêtes SQL et ont les références gràce aux formulaires
        $traitementList = [
                "admin"=>"users","logout"=>"users",
                "contact"=>"contacts",
                "newWork"=>"works"
        ];

        if(isset($_GET['page'], $traitementList[$_GET['page']]))
                require "controllers/traitement_".$traitementList[$_GET['page']].".php";

        require 'controllers/layout.php';
}
