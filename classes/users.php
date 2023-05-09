<?php

namespace classes;
require_once './classes/connectdb.php';

class users
{
    private $conn;

    public function __construct()
    {
        $db = new connectdb();
        $this->conn = $db->conn;
    }


}