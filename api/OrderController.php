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
        $user_id = $this->conn->real_escape_string($_POST['user_id']);
        $order_date = $this->conn->real_escape_string($_POST['order_date']);
        $order_price = $this->conn->real_escape_string($_POST['order_price']);
        $quantity = $this->conn->real_escape_string($_POST['quantity']);
        $query = "INSERT INTO orders(user_id, order_date, order_price, order_quantity) VALUES('$user_id','$order_date','$order_price', $quantity)";
        $sql = $this->conn->query($query);
        if ($sql == true) {
            header("Location: index.php?content=pages/messages&alert=form-success-employee");
        } else {
            header("Location: index.php?content=pages/messages&alert=form-error-employee");
        }
    }

    public function deleteOrder($orderId)
    {
        $query = "DELETE FROM orders WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("i", $orderId);
            if ($stmt->execute()) {
                $stmt->close();
                ob_end_clean();
                header("Location: index.php?content=pages/messages&alert=order-deleted-success-employee");
                exit();
            } else {
                $stmt->close();
                ob_end_clean();
                header("Location: index.php?content=pages/messages&alert=order-deleted-error-employee");
                exit();
            }
        } else {
            // Handle the case where the statement preparation failed
            // You might want to log an error or display an error message
            echo "Error executing query: " . $query . "<br>" . $this->conn->error;

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
            header("Location: index.php?content=pages/messages&alert=update-order-success-employee");
        } else {
            header("Location: index.php?content=pages/messages&alert=update-order-error-employee");
        }
    }


}