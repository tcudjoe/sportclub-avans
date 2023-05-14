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

    public function postUser($post)
    {
        $firstname = $this->conn->real_escape_string($_POST['firstname']);
        $surname = $this->conn->real_escape_string($_POST['surname']);
        $email = $this->conn->real_escape_string($_POST['email']);
        $password = $this->conn->real_escape_string($_POST['password']);
        $address = $this->conn->real_escape_string($_POST['address']);
        $zipcode = $this->conn->real_escape_string($_POST['zipcode']);
        $cityname = $this->conn->real_escape_string($_POST['cityname']);
        $userrole = $this->conn->real_escape_string($_POST['userrole']);
        $query = "INSERT INTO users (firstname, surname, email, password, address, zipcode, cityname, userrole) VALUES('$firstname','$surname','$email', '$password', '$address', '$zipcode', '$cityname', '$userrole')";
        $sql = $this->conn->query($query);
        if ($sql == true) {
            header("Location: index.php?content=pages/messages&alert=create-user-success-employee");
        } else {
            header("Location: index.php?content=pages/messages&alert=create-user-error-employee");
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