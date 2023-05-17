<?php

namespace api;

use mysqli;

class ConnectDb
{
    private $servername = "localhost";
    private $username   = "root";
    private $password   = "";
    private $database   = "dsm-winkel";
    public  $conn;

    // Database Connection
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username,$this->password,$this->database);
        if(mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        }else{
            return $this->conn;
        }
    }
}