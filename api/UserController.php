<?php

namespace api;
require_once './api/ConnectDb.php';

class UserController
{
    private $conn;

    public function __construct()
    {
        $db = new connectDb();
        $this->conn = $db->conn;
    }

    public function logout()
    {
        if (isset($_GET['action']) && $_GET['action'] === 'logout') {
            session_start();

            // Empties $_SESSION array
            unset($_SESSION["id"]);
            unset($_SESSION["userrole"]);

            // Destroys session
            session_destroy();

            header("Location: ./index.php?content=messages&alert=logout-success");
        }
    }


}