<?php

namespace api;
require_once './api/ConnectDb.php';

class CategoryController
{
    private $conn;

    public function __construct()
    {
        $db = new connectDb();
        $this->conn = $db->conn;
    }

    public function getCategories()
    {
        $query = "SELECT * FROM category";
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