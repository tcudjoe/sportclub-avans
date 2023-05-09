<?php

use classes\categories;
use classes\products;

require_once './classes/categories.php';
require_once './classes/products.php';

$object = new categories();
$categories = $object->getCategories();

$productsObject = new products();

?>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid float-end">
        <a class="navbar-brand float-end" href="index.php?content=home">Supermarkt DSM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?content=home">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Shop
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($categories as $category) { ?>
                            <li><a class="dropdown-item"
                                   href="index.php?content=products-categories&category_id=<?php echo $category['id']; ?>"><?php echo $category['name'] ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php?content=login-page">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?content=register-page">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
