<?php

class DBConnect
{
    public $username;
    public $password;
    public $dsn;

    public function __construct()
    {
        $this->username = "root";
        $this->password = "password";
        $this->dsn = "mysql:host=localhost;dbname=students";
    }

    public function connect()
    {
        $conn = null;
        try {
            $conn = new PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $exception) {
            $exception->getMessage();
        }
        return $conn;

    }

}
