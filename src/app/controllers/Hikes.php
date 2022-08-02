<?php

require_once '/application/app/models/Hike.php';

class Hikes
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function displayHikes()
    {

    }
}