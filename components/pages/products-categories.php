<?php
use api\ProductController;

require_once './api/ProductController.php';

$object = new ProductController();
$category_id = $_GET['category_id'];

?>

<section id="category-products">
    <div class="container">
        <div class="row">
            <h4>All products</h4>
            <?php
            $products = $object->getCategoryProducts($category_id);
            foreach ($products as $product) {
                ?>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/productimg<?php echo $product['img_address'] ?>" class="card-img-top"
                             alt="<?php echo $product['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name'] ?></h5>
                            <p class="card-text"><?php echo $product['description'] ?></p>
                            <p class="card-text">€<?php echo $product['price'] ?></p>
                            <a href="product-info.php?id=<?php echo $product['id'] ?>" class="btn btn-primary">More info</a>
                            <a href="product-info.php?id=<?php echo $product['id'] ?>" class="btn btn-primary">Add to cart <i class="fa fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
