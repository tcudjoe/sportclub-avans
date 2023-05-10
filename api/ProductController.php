<?php

namespace api;
require_once './api/ConnectDb.php';

class ProductController
{
    private $conn;

    public function __construct()
    {
        $db = new connectDb();
        $this->conn = $db->conn;
    }

    //gets all productController
    public function getProducts()
    {
        $query = "SELECT * FROM products";
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

    //Gets productController by category id and shows only all those in the category
    public function getCategoryProducts(){
        $category_id =$this->conn->real_escape_string($_GET["category_id"]);
        $query = "SELECT * FROM products WHERE category_id = '$category_id'";
        $result = $this->conn->query($query);
        if(isset($_GET['category_id'])){
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            }else{
                echo "No found records";
            }
        }else {
            echo "error in ".$query."<br>".$this->conn->error;
        }
    }

    //Gets productController by id and shows them individually
    public function getProductsinfo(){
        $id =$this->conn->real_escape_string($_GET["id"]);
        $query = "SELECT * FROM products WHERE id = '$id'";
        $result = $this->conn->query($query);
        if(isset($_GET['id'])){
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            }else{
                echo "No found records";
            }
        }else {
            echo "error in ".$query."<br>".$this->conn->error;
        }
    }
}