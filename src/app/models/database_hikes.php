<?php

include_once("database_connection.php");

class databaseHikes extends databaseConnection
{
    public function getAllHikes()
    {
        $statement = $this->getDatabase()->query("SELECT * FROM hikes");
        while($row = $statement->fetch()) {
            $hike = [
                "Name" => $row["name"],
                "Description" => $row["description"],
                "CreationDate" => $row["creation_date"],
                "Distance" => $row["distance"],
                "Duration" => $row["duration"],
                "Elevation" => $row["elevation_gain"]
            ];
            $hikes[] = $hike;
        }
        return $hikes;
    }
    public function getOneHike($hikeId)
    {
        $q = "SELECT Name ,CreationDate, Distance, Duration, Elevation_gain  FROM Hikes WHERE HikeID = ?";
        $statement = $this->getDatabase()->prepare($q);
        $statement->execute([$hikeId]);
        $infos = $statement->fetchAll();

        foreach ($infos as $info){
            echo $info["Name"] . "</br>";
        }
    }

}

