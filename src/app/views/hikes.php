<?php

declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once ("/application/app/models/database_connection.php");
include_once ("/application/app/models/database_hikes.php");
include "includes/header.php";
?>

<h1>Hikes</h1>

<?php

$object = new databaseHikes();
echo $object->getAllHikes("Name");
echo "</br>";
echo "</br>";
echo $object->getAllHikes("Duration");
echo "</br>";
echo "</br>";
echo $object->getAllHikes("Distance");
echo "</br>";
echo "</br>";
echo $object->getAllHikes("CreationDate");

?>

<?php
include "includes/footer.php";
?>