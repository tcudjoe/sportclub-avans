<?php

use api\ProductController;

require_once './api/ProductController.php';

$object = new ProductController();
$id = $_GET['id'];

$products = $object->getProductsinfo($id);
foreach ($products as $product) {
    ?>

    <section id="category-products">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 productinfo">
                    <h4><?php echo $product['name'] ?></h4>
                    <p class="card-text"><?php echo $product['description'] ?></p>
                    <p class="card-text">€<?php echo $product['price'] ?></p>
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <img src="./img/productimg<?php echo $product['img_address'] ?>"
                         class="card-img-top float-right productinfoimg" alt="">
                </div>
                <div class="col-12 ">
                    <a href="product-info.php?id=<?php echo $product['id'] ?>" class="btn btn-primary d-block">Add to
                        cart <i class="fa fa-cart-shopping"></i></a>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
