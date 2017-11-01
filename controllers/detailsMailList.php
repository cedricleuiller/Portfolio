<?php

$oMailList = new ContactsManager($pdo);

$aMailList = $oMailList->findAll();

foreach ($aMailList as $mail) {
        require 'views/detailsMailList.phtml';
}
