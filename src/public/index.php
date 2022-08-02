<?php

declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// On importe les différents fichiers requis
//require_once 'login.php';
require_once 'core/Request.php';
require_once 'core/Router.php';
require_once 'app/routes.php';
require_once '../app/models/Database.php';


/////////////////// ROUTER ///////////////////
// On utilise les méthodes statiques de la classe Request (pas besoin de l'instancier)
$uri = Request::uri();
$method = Request::method();

// On instancie l'object $router
$router = new Router();

// On utilise la méthode register() pour stocker les routes du fichier routes.php dans
// la propriété $routes du routeur.
$router->register($routes);

// On fait le routing en tant que tel : sur base de l'uri et de la méthode, on va
// require le bon fichier.
$router->direct($uri, $method);
/////////////////// ROUTER ///////////////////




