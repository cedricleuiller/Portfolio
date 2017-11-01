<?php

$oWorksManager = new WorksManager($pdo);

if (isset($_POST['addWork'])) {
        if (isset($_POST['screen'], $_POST['name'], $_POST['url'], $_POST['content'], $_POST['id_category'])) {
                $screen = $_POST['screen'];
                $name = $_POST['name'];
                $url = $_POST['url'];
                $content = $_POST['content'];
                $id_category = $_POST['id_category'];
                $oWorksManager->addWork($screen, $name, $url, $content, $id_category);
                echo "Votre réalisation à été ajouter à la base de données !";
        }
        
        header('Location:index.php?page=home');
        die();
}
