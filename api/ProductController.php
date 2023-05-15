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

    public function getProductsById($id)
    {
        $query = "SELECT * FROM products WHERE id = ?";
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

    public function getCategory(){
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

    public function postProduct($post)
    {
        $name = $this->conn->real_escape_string($_POST['name']);
        $description = $this->conn->real_escape_string($_POST['description']);
        $img_address = $this->conn->real_escape_string($_POST['img_address']);
        $price = $this->conn->real_escape_string($_POST['price']);
        $quantity = $this->conn->real_escape_string($_POST['quantity']);
        $category = $this->conn->real_escape_string($_POST['category']);

        $query = "INSERT INTO products (name, description, img_address, price, quantity, category_id) VALUES ('$name', '$description', '$img_address', $price, $quantity, $category)";
        $sql = $this->conn->query($query);

        if ($sql == true) {
            var_dump($sql, $query);
            header("Location: index.php?content=pages/messages&alert=create-product-success-employee");
        } else {
            var_dump($sql, $query);
            header("Location: index.php?content=pages/messages&alert=create-product-error-employee");
        }
    }


    public function putProduct()
    {
        try {
            // your database query here
            $id = $this->conn->real_escape_string($_POST['id']);
            $name = $this->conn->real_escape_string($_POST['name']);
            $description = $this->conn->real_escape_string($_POST['description']);
            $img_address = $this->conn->real_escape_string($_POST['img_address']);
            $price = $this->conn->real_escape_string($_POST['price']);
            $quantity = $this->conn->real_escape_string($_POST['quantity']);
            $category = $this->conn->real_escape_string($_POST['category']);

            $query = "UPDATE products SET name=?, description=?, img_address=?, price=?, quantity=?, category_id=? WHERE id=?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sssdiii", $name, $description, $img_address, $price, $quantity, $category, $id);

            $sql = $stmt->execute();

            if ($sql === true) {
                var_dump($sql, $query, $id);
                header("Location: index.php?content=pages/messages&alert=create-product-success-employee");
            } else {
                var_dump($sql, $query, $id);
                header("Location: index.php?content=pages/messages&alert=create-product-error-employee");
            }
        } catch (\mysqli_sql_exception $e) {
            echo $e->getMessage(); // print the error message
        }

    }




    public function deleteProduct($productId)
    {
        $query = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("i", $productId);
            if ($stmt->execute()) {
                $stmt->close();
                header("Location: index.php?content=pages/messages&alert=delete-product-success-employee");
                exit();
            } else {
                $stmt->close();
                header("Location: index.php?content=pages/messages&alert=delete-product-error-employee");
                exit();
            }
        } else {
            // Handle the case where the statement preparation failed
            // You might want to log an error or display an error message
            echo "Error executing query: " . $query . "<br>" . $this->conn->error;
        }
    }
}