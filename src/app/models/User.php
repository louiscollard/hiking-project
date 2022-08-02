<?php

require_once '/application/app/models/Database.php';

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //Find user by email or username
    public function findUserByEmailOrFirstname($email,$firstname)
    {
        $this->db->query('SELECT * FROM users WHERE firstname =:ufirstname OR email =:uemail');
        $this->db->bind(':ufirstname', $firstname);
        $this->db->bind(':uemail', $email);

        $row = $this->db->single();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    //Register User
    public function register($data)
    {
        $this->db->query('INSERT INTO users (firstname, email, password) VALUES (:ufirstname, :uemail, :upassword)');
        //Bind Values
        $this->db->bind(':ufirstname', $data['firstname']);
        $this->db->bind(':uemail', $data['email']);
        $this->db->bind(':upassword', $data['password']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Login User
    public function login($firstnameOrEmail, $password)
    {
        $row = $this->findUserByEmailOrFirstname($firstnameOrEmail, $password);

        if ($row == false) return false;

        $hashedPassword = $row->password;
        if (password_verify($password, $hashedPassword)){
            return $row;
        } else {
            return false;
        }
    }
}

