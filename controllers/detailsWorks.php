<?php
$oWorksManager = new WorksManager($pdo);

$aWorks = $oWorksManager->findAll();

foreach ($aWorks as $work) {
        require 'views/detailsWorks.phtml';
}
