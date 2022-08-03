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
        '/hikes' => 'app/views/hikes.php',
        '/tags' => 'app/views/tags.php',
        '/add'=>'app/views/add.php'
    ],
    // Routes de la méthode POST
    'POST' => [
        '/add'=>'app/controllers/hike_control.php'

    ],
];