<?php

use api\ProductController;

require_once './api/ProductController.php';
include('./api/SecurityFunctions.php');

$object = new ProductController();
$products = $object->getProducts();
?>

<style type="text/css">
    .card {
        min-width: 320px;
        min-height: 700px;
        padding: 10px
    }
</style>

<section id="home-cards">
    <div class="container">
        <div class="row">
            <h4>All products</h4>
            <?php
            $products = $object->getProducts();
            foreach ($products as $product) {
                ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/productimg<?php echo $product['img_address'] ?>" class="card-img-top"
                             alt="<?php echo $product['name'] ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $product['name'] ?></h5>
                            <p class="card-text"><?php echo mb_strimwidth($product['description'], 0, 100, "...") ?></p>
                            <p class="card-text">€<?php echo $product['price'] ?></p>
                            <a href="index.php?content=pages/product-info&id=<?php echo $product['id'] ?>"
                               class="btn btn-primary mt-auto">More info</a>
                            <a href="product-info.php?id=<?php echo $product['id'] ?>" class="btn btn-primary mt-2 float-end">Add
                                to
                                cart <i class="fa fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
