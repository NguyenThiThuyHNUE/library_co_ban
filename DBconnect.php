<?php


class DBconnect
{
    public $database_name;
    public $user;
    public $pass;
    public $connect;

    public function __construct()
    {
        $this->database_name = 'mysql:host=localhost;dbname=library';
        $this->user = 'root';
        $this->pass = '1';
    }

    public function connect()
    {
        try {
            $this->connect = new PDO($this->database_name, $this->user, $this->pass);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connect;
        } catch (PDOException $exception) {
            $exception->getMessage();
        }
    }

    public function closeConnect()
    {
        $this->connect = NULL;
    }

}