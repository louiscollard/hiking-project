<?php

declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once("/application/app/models/database_connection.php");
include_once ("/application/app/models/database_hikes.php");
include_once ("/application/app/models/database_tags.php");


?>

<html lang="en">
<head>
  <title>hiking project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Advanced search</h2>
  <p>Here, you will be able to have an even more precisely result </p>
<form method="GET"  action='database_connection.php'>
    <label for="sel1" class="form-label">Select list (select one):</label>
    <input type="text" name="busqueda">
    <input type="submit" name="enviar" value="Buscar">
      <!-- <option>Hard</option>
      <option>Rocks</option>
      <option>Mountain</option>
      <option>Forest</option> -->
</form>
    <br>
    <!-- <button type="submit" class="btn btn-primary mt-3">Submit</button> -->
    <?php
   
    if(isset($_GET['enviar'])){
        $busqueda = $_GET['busqueda'];

        $consulta = $con->query("SELECT * FROM hikes WHERE '%$busqueda%'");
    }
       
    ?>
    
    </form>
    </body>
    </html>