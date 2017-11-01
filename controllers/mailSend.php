<?php

if (isset($_SESSION['mail'])) {
        require 'views/mailSend.phtml';
        unset($_SESSION['mail']);
}
