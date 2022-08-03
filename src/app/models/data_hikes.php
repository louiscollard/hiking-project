<?php

require_once '/application/app/models/Database.php';

class Hike
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //Register User
    public function add($data)
    {
        $this->db->query('INSERT INTO hikes (name, distance, duration) VALUES (:uname, :udistance, :uduration)');
        //Bind Values
        $this->db->bind(':uname', $data['name']);
        $this->db->bind(':udistance', $data['distance']);
        $this->db->bind(':uduration', $data['duration']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
