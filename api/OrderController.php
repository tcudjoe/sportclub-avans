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

    public function getOrdersByUser($id){
        $query = "SELECT * FROM orders WHERE user_id = '$id' ORDER BY order_date DESC";
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