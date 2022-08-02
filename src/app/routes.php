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
        '/login' => 'app/views/login.php',
        '/register' => 'app/views/register.php',
        '/logout' => 'app/controllers/Users.php?q=logout',
    ],
    // Routes de la méthode POST
    'POST' => [
        '/register' => 'app/controllers/Users.php',
        '/login' => 'app/controllers/Users.php',
    ],
];