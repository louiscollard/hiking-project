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
        '/admin' => '../public/admin_homepage.php',
        '/login' => '../public/login.php',
        '/logout' => '../public/logout.php',
        '/register' => '../public/register.php',
        '/newhike' => '../public/NewHike.php',
        '/welcome' => '../public/welcome.php',
        '/update' => '../public/update.php',
        '/delete' => '../public/delete.php'
    ],
    // Routes de la méthode POST
    'POST' => [
        '/login' => '../public/login.php',
        '/register' => '../public/register.php',
        '/update' => '../public/update.php',
        '/delete' => '../public/delete.php',
        '/newhike' => '../public/NewHike.php',
    ],
];