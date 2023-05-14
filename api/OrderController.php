<?php

namespace api;
require_once './api/ConnectDb.php';
require_once './api/SecurityFunctions.php';

use mysql_xdevapi\Exception;
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
        $query="INSERT INTO orders(user_id, order_date, order_price, order_quantity) VALUES('$user_id','$order_date','$order_price', $quantity)";
        $sql = $this->conn->query($query);
        if ($sql==true) {
            header("Location: index.php?content=pages/messages&alert=form-success-employee");
        }else{
            header("Location: index.php?content=pages/messages&alert=form-error-employee");
        }
    }

}