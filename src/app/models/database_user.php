<?php

include_once("database_connection.php");

class databaseUsers extends databaseConnection
{
    public function getAllInfosUser()
    {
        $statement = $this->getDatabase()->query("SELECT * FROM users");
        $users = [];
        while($row = $statement->fetch()) {
            $user = [
                "Id" => $row["id"],
                "Firstname" => $row["firstname"],
                "Lastname" => $row["lastname"],
                "Email" => $row["email"],
            ];
            $users [] = $user;
        }
        return $users;
    }
    public function getFirstName($firstname)
    {

        $q = "SELECT firstname FROM users WHERE id = ?";
        $statement = $this->getDatabase()->prepare($q);
        $statement->execute([$firstname]);
        $infos = $statement->fetchAll();
        foreach ($infos as $info) {
            echo $info["firstname"] . "</br>";
        }
    }

    public function getLastName($lastname)
    {

        $q = "SELECT lastname FROM users WHERE id = ?";
        $statement = $this->getDatabase()->prepare($q);
        $statement->execute([$lastname]);
        $infos = $statement->fetchAll();
        foreach ($infos as $info) {
            echo $info["lastname"] . "</br>";
        }
    }

    public function getEmail($email)
    {

        $q = "SELECT email FROM users WHERE id = ?";
        $statement = $this->getDatabase()->prepare($q);
        $statement->execute([$email]);
        $infos = $statement->fetchAll();
        foreach ($infos as $info) {
            echo $info["email"] . "</br>";
        }
    }
}