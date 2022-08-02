<?php

class Database
{
    private string $host = "188.166.24.55";
    private string $charset = "utf8mb4";
    private string $db = "jepsen6-laravel";
    private string $login = "laravel";
    private string $password = "5E3tYVTm6OJcxbHh";

    //Will be the PDO object
    private $dbh;
    private $statement;
    private $error;

    public function __construct()
    {
        // dsn = database source name
        $dsn = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            // We create a new instance of the class PDO
            $this->dbh = new PDO($dsn, $this->login, $this->password, $options);
        } catch(PDOException $e) {
            // We intantiate an Exception object in $e so we can use methods within this object to display errors nicely
            $this->error = $e->getMessage();
            return $this->error;
        }
    }

    //Prepare statement with query
    public function query($sql)
    {
        $this->statement = $this->dbh->prepare($sql);
    }

    //Bind values, to prepared statement using named parameters
    public function bind($param, $value, $type = null)
    {
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }

    //Execute the prepared statement
    public function execute(){
        return $this->statement->execute();
    }

    //Return multiple records
    public function resultSet(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    //Return a single record
    public function single(){
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    //Get row count
    public function rowCount(){
        return $this->statement->rowCount();
    }
}