<?php

class databaseConnection
{
    private string $host;
    private string $charset;
    private string $db;
    private string $login;
    private string $password;

    public function getDatabase()
    {
       
        $this->host = "188.166.24.55";
        $this->db = "jepsen6-laravel";
        $this->login = "laravel";
        $this->password = "5E3tYVTm6OJcxbHh";
        $this->charset = "utf8mb4";

        try {
            // dsn = database source name
            $dsn = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
            // We create a new instance of the class PDO
            $pdo = new PDO($dsn, $this->login, $this->password);
            //We want any issues to throw an exception with details, instead of a silence or a simple warning
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch(PDOException $e) {
            // We intantiate an Exception object in $e so we can use methods within this object to display errors nicely
            echo "Connection Failed" . $e->getMessage();
            exit;
        }
    }
   
}
