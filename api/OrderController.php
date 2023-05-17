<?php

namespace api;
require_once './api/ConnectDb.php';
require_once './api/SecurityFunctions.php';

use function SecurityFunctions\sanitize;

class OrderController
{
    private $conn;

    public function __construct()
    {
        $db = new connectDb();
        $this->conn = $db->conn;
    }

    public function getOrders()
    {
        $query = "SELECT * FROM orders ORDER BY order_date DESC";
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

    public function getOrdersById($id)
    {
        $query = "SELECT * FROM orders WHERE id = ?";
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

    public function getOrdersByUser($id)
    {
        $query = "SELECT * FROM orders WHERE user_id = ? ORDER BY order_date DESC";
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

    public function postOrder($post)
    {
        $userrole = $this->conn->real_escape_string($_POST["userrole"]);
        $user_id = $this->conn->real_escape_string($_POST['user_id']);
        $order_date = $this->conn->real_escape_string($_POST['order_date']);
        $order_price = $this->conn->real_escape_string($_POST['order_price']);
        $quantity = $this->conn->real_escape_string($_POST['quantity']);

        $query = "INSERT INTO orders(user_id, order_date, order_price, order_quantity) VALUES('$user_id','$order_date',$order_price, $quantity)";
        $sql = $this->conn->query($query);

        if ($sql == true) {
            if ($userrole == "employee") {
                header("Location: index.php?content=pages/messages&alert=form-success-employee");
            } else if ($userrole == "admin") {
                header("Location: index.php?content=pages/messages&alert=form-success-admin");
            } else {
                header("Location: index.php?content=pages/messages&alert=form-success-customer");
            }
        } else {
            if ($userrole == "employee") {
                header("Location: index.php?content=pages/messages&alert=form-error-employee");
            } else if ($userrole == "admin") {
                header("Location: index.php?content=pages/messages&alert=form-error-admin");
            } else {
                header("Location: index.php?content=pages/messages&alert=form-error-customer");
            }
        }
    }


    public function deleteOrder($orderId)
    {
        $userrole = $this->conn->real_escape_string($_GET["userrole"]);

        $query = "DELETE FROM orders WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("i", $orderId);
            if ($stmt->execute()) {
                if ($userrole == "employee") {
                    header("Location: index.php?content=pages/messages&alert=delete-order-success-employee");
                    $stmt->close();
                } else if ($userrole == "admin") {
                    header("Location: index.php?content=pages/messages&alert=delete-order-success-admin");
                    $stmt->close();
                } else {
                    header("Location: index.php?content=pages/messages&alert=delete-order-success-customer");
                    $stmt->close();
                }
            } else {
                if ($userrole == "employee") {
                    header("Location: index.php?content=pages/messages&alert=delete-order-error-employee");
                    $stmt->close();
                } else if ($userrole == "admin") {
                    header("Location: index.php?content=pages/messages&alert=delete-order-error-admin");
                    $stmt->close();
                } else {
                    header("Location: index.php?content=pages/messages&alert=delete-order-error-customer");
                    $stmt->close();
                }
            }
        } else {
            // Handle the case where the statement preparation failed
            // You might want to log an error or display an error message
            if ($userrole == "employee") {
                header("Location: index.php?content=pages/messages&alert=delete-order-error-employee");
                echo "Error executing query: " . $query . "<br>" . $this->conn->error;
            } else if ($userrole == "admin") {
                header("Location: index.php?content=pages/messages&alert=delete-order-error-admin");
                echo "Error executing query: " . $query . "<br>" . $this->conn->error;
            } else {
                header("Location: index.php?content=pages/messages&alert=delete-order-error-customer");
                echo "Error executing query: " . $query . "<br>" . $this->conn->error;
            }

        }
    }

    public function putOrders()
    {
        $id = $this->conn->real_escape_string($_POST['id']);
        $user_id = $this->conn->real_escape_string($_POST['user_id']);
        $order_date = $this->conn->real_escape_string($_POST['order_date']);
        $order_price = $this->conn->real_escape_string($_POST['order_price']);
        $quantity = $this->conn->real_escape_string($_POST['quantity']);

        $query = "UPDATE orders SET user_id = '$user_id', order_date = '$order_date', order_price='$order_price', order_quantity = $quantity WHERE id = $id";
        $sql = $this->conn->query($query);

        if ($sql == true) {
            var_dump($sql, $query);
            header("Location: index.php?content=pages/messages&alert=update-order-success-employee");
        } else {
            var_dump($sql, $query);
            header("Location: index.php?content=pages/messages&alert=update-order-error-employee");
        }
    }
}