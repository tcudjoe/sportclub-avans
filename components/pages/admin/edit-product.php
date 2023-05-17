<?php

use api\ProductController;
use api\SecurityFunctions;

include 'api/SecurityFunctions.php';
$functions = new SecurityFunctions();
$object = new ProductController();

$functions->is_authorised(["admin"]);

// Update Record in product table
if (isset($_POST['submit'])) {
    $object->putProduct();
}
?>

<div class="bg-image">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <form method="POST" action="index.php?content=pages/admin/edit-product">
                    <div class="card">
                        <div class="text-center signupHeader">
                            <h1 id="signupHeader">Be a part of DSM Supermarkt!</h1>
                            <label for="signupHeader">Sign up now to order groceries</label>
                        </div>
                        <?php
                        if (isset($_GET['id']) && !empty($_GET['id'])) {
                            $editProduct = $_GET['id'];
                            $product = $object->getProductsById($editProduct)[0];
                            ?>
                            <div class="mb-3">
                                <label for="inputFirstname" class="form-label">Name:</label>
                                <input type="text" id="firstname" class="form-control" placeholder="John" name="name"
                                       required value="<?php echo $product['name'] ?>">
                            </div>
                            <!-- ... previous code ... -->

                            <div class="mb-3">
                                <label for="floatingTextarea2">Description</label>
                                <textarea class="form-control" name="description" placeholder="description" id="floatingTextarea2" style="height: 100px"><?php echo $product['description'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="inputAddress" class="form-label float-left">img url:</label>
                                <input type="text" required class="form-control" id="inputAddress" aria-describedby="emailHelp" placeholder="john@doe.com" name="img_address" value="<?php echo $product['img_address'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="inputZipcode" class="form-label float-left">price:</label>
                                <input type="number" required class="form-control" id="inputZipcode" aria-describedby="emailHelp" placeholder="john@doe.com" name="price" value="<?php echo $product['price'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="inputCityname" class="form-label float-left">quantity:</label>
                                <input type="number" required class="form-control" id="inputCityname" aria-describedby="emailHelp" placeholder="john@doe.com" name="quantity" value="<?php echo $product['quantity'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label float-left">Category id:</label>
                                <select class="form-select" name="category" aria-label="Default select example">
                                    <option <?php if (isset($product['category']) && $product['category'] === 1) { echo "selected"; } ?> value="1">Drinks</option>
                                    <option <?php if (isset($product['category']) && $product['category'] === 2) { echo "selected"; } ?> value="2">Bread</option>
                                    <option <?php if (isset($product['category']) && $product['category'] === 3) { echo "selected"; } ?> value="3">Meat</option>
                                    <option <?php if (isset($product['category']) && $product['category'] === 4) { echo "selected"; } ?> value="4">Fish</option>
                                    <option <?php if (isset($product['category']) && $product['category'] === 5) { echo "selected"; } ?> value="5">Dairy</option>
                                    <option <?php if (isset($product['category']) && $product['category'] === 6) { echo "selected"; } ?> value="6">Vegitables</option>
                                    <option <?php if (isset($product['category']) && $product['category'] === 7) { echo "selected"; } ?> value="7">Fruits</option>
                                    <option <?php if (isset($product['category']) && $product['category'] === 8) { echo "selected"; } ?> value="8">Condiments</option>
                                </select>
                            </div>

                            <!-- ... remaining code ... -->

                            <input type="hidden" name="id" value="<?php echo $product['id'] ?>"/>
                        <?php } ?>

                        <input type="hidden" name="userrole" value="<?php echo $_SESSION['userrole']; ?>">
                        <input type="submit" name="submit" class="btn btn-primary" value="Update product"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

