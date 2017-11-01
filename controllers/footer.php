<?php

require 'views/footer.phtml';

// condition du bouton de déconnexion admin
if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1) {
        require 'views/logout.phtml';
}
