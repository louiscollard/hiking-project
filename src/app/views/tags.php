<?php

declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once ("/application/app/models/Database.php");
include_once ("/application/app/models/database_tags.php");
include "includes/header.php";
?>

    <h1>Tags</h1>

<?php

$object = new databaseTags();
echo $object->getAllTags("TagName");

?>

<?php
include "includes/footer.php";
?>