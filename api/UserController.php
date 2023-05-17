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

            header("Location: ./index.php?content=pages/messages&alert=logout-success");
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
            if ($userrole == "employee") {
                header("Location: index.php?content=pages/messages&alert=create-user-success-employee");
            } else if ($userrole == "admin") {
                header("Location: index.php?content=pages/messages&alert=create-user-success-admin");
            } else {
                header("Location: index.php?content=pages/messages&alert=create-user-success-customer");
            }
        } else {
            if ($userrole == "employee") {
                header("Location: index.php?content=pages/messages&alert=create-user-error-employee");
            } else if ($userrole == "admin") {
                header("Location: index.php?content=pages/messages&alert=create-user-error-admin");
            } else {
                header("Location: index.php?content=pages/messages&alert=create-user-error-customer");
            }
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

    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE id = ?";
        $statement = $this->conn->prepare($query);
        $statement->bind_param("s", $id);
        $statement->execute();
        $result = $statement->get_result();

        if ($result) {
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            } else {
                echo "No records found";
            }
        } else {
            echo "Error executing query: " . $query . "<br>" . $this->conn->error;
        }
    }

    public function putUser()
    {
        $id = $this->conn->real_escape_string($_POST['id']);
        $firstname = $this->conn->real_escape_string($_POST['firstname']);
        $surname = $this->conn->real_escape_string($_POST['surname']);
        $email = $this->conn->real_escape_string($_POST['email']);
        $password = $this->conn->real_escape_string($_POST['password']);
        $address = $this->conn->real_escape_string($_POST['address']);
        $zipcode = $this->conn->real_escape_string($_POST['zipcode']);
        $cityname = $this->conn->real_escape_string($_POST['cityname']);
        $userrole = $this->conn->real_escape_string($_POST['userrole']);

        $query = "UPDATE users SET firstname = '$firstname', surname = '$surname', email = '$email', password = '$password', address = '$address', zipcode = '$zipcode', cityname = '$cityname', userrole = '$userrole' WHERE id = $id";
        $sql = $this->conn->query($query);

        if ($sql == true) {
            if ($userrole == "employee") {
                header("Location: index.php?content=pages/messages&alert=update-user-success-employee");
            } else if ($userrole == "admin") {
                header("Location: index.php?content=pages/messages&alert=update-user-success-admin");
            } else {
                header("Location: index.php?content=pages/messages&alert=update-user-success-customer");
            }
        } else {
            if ($userrole == "employee") {
                header("Location: index.php?content=pages/messages&alert=update-user-error-employee");
            } else if ($userrole == "admin") {
                header("Location: index.php?content=pages/messages&alert=update-user-error-admin");
            } else {
                header("Location: index.php?content=pages/messages&alert=update-user-error-customer");
            }
        }
    }

    public function deleteUser($customerId)
    {
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $userrole = $this->conn->real_escape_string($_POST['userrole']);

        if ($stmt) {
            $stmt->bind_param("i", $customerId);
            if ($stmt->execute()) {
                if ($stmt->execute()) {
                    if ($userrole == "employee") {
                        $stmt->close();
                        ob_end_clean();
                        header("Location: index.php?content=pages/messages&alert=delete-user-success-employee");
                    } else {
                        $stmt->close();
                        ob_end_clean();
                        header("Location: index.php?content=pages/messages&alert=delete-user-success-admin");
                    }
                } else {
                    if ($userrole == "employee") {
                        $stmt->close();
                        ob_end_clean();
                        header("Location: index.php?content=pages/messages&alert=delete-user-error-employee");
                    } else{
                        $stmt->close();
                        ob_end_clean();
                        header("Location: index.php?content=pages/messages&alert=delete-user-error-admin");
                    }
                }
            }
//                $stmt->close();
//                ob_end_clean();
//                header("Location: index.php?content=pages/messages&alert=delete-user-success-employee");
//                exit();
//            } else {
//                $stmt->close();
//                ob_end_clean();
//                header("Location: index.php?content=pages/messages&alert=delete-user-error-employee");
//                exit();
//            }
        } else {
            // Handle the case where the statement preparation failed
            // You might want to log an error or display an error message
            echo "Error executing query: " . $query . "<br>" . $this->conn->error;

        }
    }
}