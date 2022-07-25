<?php

/*
 * Ici, on définit les routes de notre application.
 * Nouvelle page ? => Nouvelle route
 */

$routes = [
    // Routes de la méthode GET (typiquement afficher une page)
    'GET' => [
        '/' => 'app/views/homepage.php',
        '/home' => 'app/views/homepage.php',
        '/contact' => 'app/views/contact.php',
        '/exo10' => 'app/views/exos/10-mvc.php',
    ],
    // Routes de la méthode POST
    'POST' => [

    ],
];