<?php

include_once("database_connection.php");

class databaseHikes extends databaseConnection
{
    public function getAllHikes($str)
    {
        $statement = $this->getDatabase()->query("SELECT * FROM hikes");
        while($row = $statement->fetch()) {
            echo $row[$str];
        }
    }

}

