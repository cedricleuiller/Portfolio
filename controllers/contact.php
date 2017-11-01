<?php

$sErrorDisplay = "";

if (isset($sError)) {
        $sErrorDisplay = $sError;
}
require 'views/contact.phtml';
