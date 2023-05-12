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

    public function getUsers()
    {
        $query = "SELECT * FROM users ORDER BY firstname ASC";
        $result = $this->conn->query($query);
        if ($result) {
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            } else {
                echo "No found records";
            }
        } else {
            echo "error in " . $query . "<br>" . $this->conn->error;
        }
    }

    public function getCustomers()
    {
        $query = "SELECT * FROM users WHERE userrole = 'customer' ORDER BY firstname ASC";
        $result = $this->conn->query($query);
        if ($result) {
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            } else {
                echo "No found records";
            }
        } else {
            echo "error in " . $query . "<br>" . $this->conn->error;
        }
    }
}