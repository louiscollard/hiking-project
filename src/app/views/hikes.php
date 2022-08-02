<?php

declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once ("/application/app/models/Database.php");
include_once ("/application/app/models/database_hikes.php");
include "includes/header.php";
?>

<h1>Hikes</h1>

<?php

$object = new databaseHikes();
echo $object->getAllHikes();
echo "</br>";
$object2 = new databaseHikes();
$object->getOneHike(1);
$object->getOneHike(2);
$object->getOneHike(3);


?>

<?php
include "includes/footer.php";
?>