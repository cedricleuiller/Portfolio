<?php

// Condition pour le header 
if (isset($_SESSION, $_SESSION['admin']) && $_SESSION['admin'] === 1){
                        require_once 'views/headerAdmin.phtml';
                } else {
                        require_once 'views/header.phtml';
                }
?>
