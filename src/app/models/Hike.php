<?php

require_once '/application/app/models/Database.php';

class Hike
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getHikes($name)
    {
        $this->db->query("SELECT * FROM hikes");
        $this->db->bind(':name', $name);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}

