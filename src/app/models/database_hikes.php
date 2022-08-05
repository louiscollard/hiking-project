<?php

include_once("database_connection.php");

class databaseHikes extends databaseConnection
{
    public function getAllHikes()
    {
        $statement = $this->getDatabase()->query("SELECT * FROM hikes");
        $hikes =[];
        while($row = $statement->fetch()) {
            $hike = [
                "Id" => $row["id"],
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

    public function getAllHikesPersoUser($sessionUser)
    {
        $statement = $this->getDatabase()->query("SELECT * FROM hikes WHERE user_id=$sessionUser");
        $hikes =[];
        while($row = $statement->fetch()) {
            $hike = [
                "Id" => $row["id"],
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


    public function getOneHikeName($hikeId)
    {

        $q = "SELECT name ,description, creation_date, distance, duration, elevation_gain FROM hikes WHERE id = ?";
        $statement = $this->getDatabase()->prepare($q);
        $statement->execute([$hikeId]);
        $infos = $statement->fetchAll();
        foreach ($infos as $info){
                echo $info["name"]. "</br>";
        }

        /*
        $q = "SELECT id,name,description,creation_date,distance,duration,elevation_gain FROM hikes WHERE id = ?";
        $statement = $this->getDatabase()->prepare($q);
        $statement->execute([$hikeId]);
        $hikesOne = [];
        while($row = $statement->fetch()) {
            $hike = [
                "Id" => $row["id"],
                "Name" => $row["name"],
                "Description" => $row["description"],
                "CreationDate" => $row["creation_date"],
                "Distance" => $row["distance"],
                "Duration" => $row["duration"],
                "Elevation" => $row["elevation_gain"]
            ];
            $hikesOne[] = $hike;
        }
        return $hikesOne;
        */
    }

    public function getOneHikeDescription($hikeId)
    {
        $q = "SELECT name ,description, creation_date, distance, duration, elevation_gain FROM hikes WHERE id = ?";
        $statement = $this->getDatabase()->prepare($q);
        $statement->execute([$hikeId]);
        $infos = $statement->fetchAll();
        foreach ($infos as $info) {
            echo $info["description"] . "</br>";
        }
    }

    public function getOneHikeCreationDate($hikeId)
    {
        $q = "SELECT name ,description, creation_date, distance, duration, elevation_gain FROM hikes WHERE id = ?";
        $statement = $this->getDatabase()->prepare($q);
        $statement->execute([$hikeId]);
        $infos = $statement->fetchAll();
        foreach ($infos as $info) {
            echo $info["creation_date"] . "</br>";
        }
    }

    public function getOneHikeDistance($hikeId)
    {
        $q = "SELECT name ,description, creation_date, distance, duration, elevation_gain FROM hikes WHERE id = ?";
        $statement = $this->getDatabase()->prepare($q);
        $statement->execute([$hikeId]);
        $infos = $statement->fetchAll();
        foreach ($infos as $info) {
            echo $info["distance"];
        }
    }

    public function getOneHikeDuration($hikeId)
    {
        $q = "SELECT name ,description, creation_date, distance, duration, elevation_gain FROM hikes WHERE id = ?";
        $statement = $this->getDatabase()->prepare($q);
        $statement->execute([$hikeId]);
        $infos = $statement->fetchAll();
        foreach ($infos as $info) {
            echo $info["duration"] . "</br>";
        }
    }

    public function getOneHikeElevationGain($hikeId)
    {
        $q = "SELECT name ,description, creation_date, distance, duration, elevation_gain FROM hikes WHERE id = ?";
        $statement = $this->getDatabase()->prepare($q);
        $statement->execute([$hikeId]);
        $infos = $statement->fetchAll();
        foreach ($infos as $info) {
            echo $info["elevation_gain"];
        }
    }
}