<?php

include_once("database_connection.php");

class databaseHikes extends databaseConnection
{
    public function getAllHikes()
    {
        $statement = $this->getDatabase()->query("SELECT * FROM Hikes");
        while($row = $statement->fetch()) {
            echo "Name of hike : " . $row["Name"] . "</br>";
            echo "Date of hike : " .$row["CreationDate"] . "</br>";
            echo "Distance of hike : " .$row["Distance"]. " km" ."</br>";
            echo "Duration of hike : " .$row["Duration"]. " min" . "</br>";
            echo "Elevation of hike : " .$row["Elevation_gain"]. " m" . "</br>";
        }
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