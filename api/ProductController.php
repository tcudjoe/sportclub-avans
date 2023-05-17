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
        $userrole = $this->conn->real_escape_string($_POST["userrole"]);
        $name = $this->conn->real_escape_string($_POST['name']);
        $description = $this->conn->real_escape_string($_POST['description']);
        $img_address = $this->conn->real_escape_string($_POST['img_address']);
        $price = $this->conn->real_escape_string($_POST['price']);
        $quantity = $this->conn->real_escape_string($_POST['quantity']);
        $category = $this->conn->real_escape_string($_POST['category']);

        $query = "INSERT INTO products (name, description, img_address, price, quantity, category_id) VALUES ('$name', '$description', '$img_address', $price, $quantity, $category)";
        $sql = $this->conn->query($query);

        if ($sql == true) {
            if ($userrole == "employee") {
                header("Location: index.php?content=pages/messages&alert=create-product-success-employee");
            } else if ($userrole == "admin") {
                header("Location: index.php?content=pages/messages&alert=create-product-success-admin");
            } else {
                header("Location: index.php?content=pages/messages&alert=create-product-success-customer");
            }
        } else {
            if ($userrole == "employee") {
                header("Location: index.php?content=pages/messages&alert=create-product-error-employee");
            } else if ($userrole == "admin") {
                header("Location: index.php?content=pages/messages&alert=create-product-error-admin");
            } else {
                header("Location: index.php?content=pages/messages&alert=create-product-error-customer");
            }
        }
    }

    public function getCount($table)
    {
        // Assuming you already have a valid database connection ($conn)
        $query = "SELECT COUNT(*) as count FROM $table";
        $result = $this->conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            $count = $row['count'];
            return $count;
        } else {
            return 0; // Return 0 if there is an error retrieving the count
        }
    }

    public function getCountByUser($table, $user)
    {
        // Assuming you already have a valid database connection ($conn)
        $query = "SELECT COUNT(*) as count FROM $table WHERE user_id = $user";
        $result = $this->conn->query($query);

        if ($result) {
            $row = $result->fetch_assoc();
            $count = $row['count'];
            return $count;
        } else {
            return 0; // Return 0 if there is an error retrieving the count
        }
    }



    public function putProduct()
    {
        try {
            // your database query here
            $userrole = $this->conn->real_escape_string($_POST["userrole"]);
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

            if ($sql == true) {
                if ($userrole == "employee") {
                    header("Location: index.php?content=pages/messages&alert=update-product-success-employee");
                } else if ($userrole == "admin") {
                    header("Location: index.php?content=pages/messages&alert=update-product-success-admin");
                } else {
                    header("Location: index.php?content=pages/messages&alert=update-product-success-customer");
                }
            } else {
                if ($userrole == "employee") {
                    header("Location: index.php?content=pages/messages&alert=update-product-error-employee");
                } else if ($userrole == "admin") {
                    header("Location: index.php?content=pages/messages&alert=update-product-error-admin");
                } else {
                    header("Location: index.php?content=pages/messages&alert=update-product-error-customer");
                }
            }
        } catch (\mysqli_sql_exception $e) {
            var_dump($sql, $query, $id);
            header("Location: index.php?content=pages/messages&alert=create-product-error-employee");

            echo var_dump($e->getMessage()); // print the error message
        }

    }




    public function deleteProduct($productId)
    {
        $userrole = $this->conn->real_escape_string($_POST["userrole"]);
        $query = "DELETE FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param("i", $productId);
            if ($stmt->execute()) {
                if ($userrole == "employee") {
                    $stmt->close();
                    ob_end_clean();
                    var_dump($query, exit());
                    header("Location: index.php?content=pages/messages&alert=delete-product-success-employee");
                } else {
                    $stmt->close();
                    ob_end_clean();
                    var_dump($query);

                    header("Location: index.php?content=pages/messages&alert=delete-product-success-admin");
                }
            } else {
                if ($userrole == "employee") {
                    $stmt->close();
                    ob_end_clean();
                    header("Location: index.php?content=pages/messages&alert=delete-product-error-employee");
                } else{
                    $stmt->close();
                    ob_end_clean();
                    header("Location: index.php?content=pages/messages&alert=delete-product-error-admin");
                }
            }
        } else {
            // Handle the case where the statement preparation failed
            // You might want to log an error or display an error message
            echo "Error executing query: " . $query . "<br>" . $this->conn->error;
        }
    }
}