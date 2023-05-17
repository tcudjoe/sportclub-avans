<?php

namespace api;
require_once __DIR__ . '/ConnectDb.php';


class RegisterController
{
    private $conn;

    public function __construct()
    {
        $db = new connectDb();
        $this->conn = $db->conn;
    }

    public function registerUser()
    {
        // Get form fields from $_POST
        $firstname = isset($_POST['firstname']) ? $this->conn->real_escape_string($_POST['firstname']) : '';
        $surname = isset($_POST['surname']) ? $this->conn->real_escape_string($_POST['surname']) : '';
        $email = isset($_POST['email']) ? $this->conn->real_escape_string($_POST['email']) : '';
        $password = isset($_POST['password']) ? $this->conn->real_escape_string($_POST['password']) : '';
        $address = isset($_POST['address']) ? $this->conn->real_escape_string($_POST['address']) : '';
        $zipcode = isset($_POST['zipcode']) ? $this->conn->real_escape_string($_POST['zipcode']) : '';
        $cityname = isset($_POST['cityname']) ? $this->conn->real_escape_string($_POST['cityname']) : '';

        $query = "INSERT INTO users(firstname, surname, email, password, address, zipcode, cityname, userrole) VALUES('$firstname', '$surname','$email','$password', '$address', '$zipcode', '$cityname', 'customer')";
        $sql = $this->conn->query($query);
//        var_dump($sql,$query);
        if ($sql == true) {
//            var_dump($sql);
            header("Location: ./index.php?content=pages/messages&alert=register-success");
        } else {
//        var_dump($sql,$query);
            header("Location: ./index.php?content=pages/messages&alert=register-error");
        }
    }
}
