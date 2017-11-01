<?php

$oCategoriesManager = new WorksManager($pdo);

$aCategories = $oCategoriesManager->selectCategory();

foreach ($aCategories as $aCategory) {
        require 'views/categories.phtml';
}
