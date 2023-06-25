<?php
use api\ProductController;

require_once './api/ProductController.php';

$object = new ProductController();
$category_id = $_GET['category_id'];

?>

<style type="text/css">
    .card {
        min-width: 320px;
        min-height: 700px;
        padding: 10px
    }
</style>

<section id="category-products">
    <div class="container">
        <div class="row">
            <h4>All products</h4>
            <?php
            $products = $object->getCategoryProducts($category_id);
            foreach ($products as $product) {
                ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/productimg<?php echo $product['img_address'] ?>" class="card-img-top"
                             alt="<?php echo $product['name'] ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $product['name'] ?></h5>
                            <p class="card-text"><?php echo $product['description'] ?></p>
                            <p class="card-text">€<?php echo $product['price'] ?></p>
                            <a href="index.php?content=pages/product-info&id=<?php echo $product['id'] ?>" class="btn btn-primary mt-auto float-start">More info</a>
                            <a href="index.php?id=<?php echo $product['id'] ?>" class="btn btn-primary mt-2 float-end">Add to cart <i class="fa fa-cart-shopping"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
