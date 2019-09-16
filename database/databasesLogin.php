<?php

include_once "DBconnect.php";

class databasesLogin
{
    public $PDO;
    public $data;
    public $conn;

    public function __construct()
    {
        $this->PDO = new DBconnect();
        $this->PDO->connect();
        $this->conn = $this->PDO->connect;
    }

    public function create($email, $username, $pass)
    {
        $this->data = $this->conn->prepare("INSERT INTO user (email, username, pass) VALUE (:email, :username,:pass)");
        $this->data->bindParam(":email", $email);
        $this->data->bindParam(":username", $username);
        $this->data->bindParam(":pass", $pass);
        $this->data->execute();
    }

    public function checkLogin($username, $pass)
    {
        session_start();
        $sql = "SELECT * FROM user WHERE username='$username' AND pass='$pass'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetch();
        if ($result == 0) {
            echo "Sai tai khoan hoac mat khau";

        } else {
            $_SESSION['username'] = $username;
            $_SESSION['pass'] = $pass;
            //header('location: login.php');
        }

    }

}
//$databasesnew=new databasesLogin();
//$databasesnew->create('thuy@gmail.com','codegym','123456');