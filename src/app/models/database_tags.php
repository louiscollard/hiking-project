<?php

class databaseTags extends databaseConnection
{
    public function getAllTags()
    {
        $statement = $this->getDatabase()->query("SELECT * FROM Tags");
        while($row = $statement->fetch()) {
            echo $row["TagName"];
        }
    }
}