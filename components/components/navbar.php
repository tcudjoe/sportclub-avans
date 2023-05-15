<?php


use api\CategoryController;
use api\ProductController;
use api\UserController;

require_once './api/CategoryController.php';
require_once './api/ProductController.php';
require_once './api/UserController.php';

$object = new CategoryController();
$categories = $object->getCategories();

$userObj = new UserController();
$logout = $userObj->logout();

$productsObject = new ProductController();

if (isset($_GET["content"])) {
    $active = $_GET["content"];
} else {
    $active = "";
}

?>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid float-end">
        <a class="navbar-brand float-end" href="index.php?content=pages/home">Supermarkt DSM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?content=pages/home">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Shop
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($categories as $category) { ?>
                            <li><a class="dropdown-item"
                                   href="index.php?content=pages/products-categories&category_id=<?php echo $category['id']; ?>"><?php echo $category['name'] ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php
                if (isset($_SESSION["id"])) {
                    switch ($_SESSION["userrole"]) {
                        case 'admin':
                            echo '<li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle ';
                            echo (in_array($active, ["a-users", "a-reset_password"])) ? "active" : "";
                            echo '" role="button" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin workbench
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item ';
                            echo ($active == "dashboard") ? "active" : "";
                            echo '" href="./index.php?content=pages/admin/dashboard&user_id=' . $_SESSION["id"] . '">Dashboard</a>
<a class="dropdown-item ';
                            echo ($active == "products") ? "active" : "";
                            echo '" href="./index.php?content=pages/admin/products&user_id=' . $_SESSION["id"] . '">Products</a>
                        <a class="dropdown-item ';
                            echo ($active == "users") ? "active" : "";
                            echo '" href="./index.php?content=pages/admin/users&user_id=' . $_SESSION["id"] . '">Users</a>
                        <a class="dropdown-item ';
                            echo ($active == "orders") ? "active" : "";
                            echo '" href="./index.php?content=pages/admin/orders&user_id=' . $_SESSION["id"] . '">Orders</a>
                      </div>
                    </li>';
                            break;

                        case 'employee':
                            echo '<li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle ';
                            echo (in_array($active, ["read", "pre_update"])) ? "active" : "";
                            echo '" role="button" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Employee workbench
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item ';
                            echo ($active == "dashboard") ? "active" : "";
                            echo '" href="./index.php?content=pages/employee/dashboard&user_id=' . $_SESSION["id"] . '">Dashboard</a>
 <a class="dropdown-item ';
                            echo ($active == "products") ? "active" : "";
                            echo '" href="./index.php?content=pages/employee/products&user_id=' . $_SESSION["id"] . '">Products</a>
                        <a class="dropdown-item ';
                            echo ($active == "customers") ? "active" : "";
                            echo '" href="./index.php?content=pages/employee/customers&user_id=' . $_SESSION["id"] . '">Customers</a>
                        <a class="dropdown-item ';
                            echo ($active == "orders") ? "active" : "";
                            echo '" href="./index.php?content=pages/employee/orders&user_id=' . $_SESSION["id"] . '">Orders</a>
                      </div>                      
                    </li>';
                            break;

                        case 'customer':
                            echo '<li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle ';
                            echo (in_array($active, ["dashboard", "news"])) ? "active" : "";
                            echo '" role="button" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Options
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item';
                            echo ($active == "dashboard") ? "active" : "";
                            echo '"href="./index.php?content=pages/customer/dashboard&user_id=' . $_SESSION["id"] . '">Dasboard</a>
                        <a class="dropdown-item';
                            echo ($active == "orders") ? "active" : "";
                            echo '" href="./index.php?content=pages/customer/orders&user_id=' . $_SESSION["id"] . '">Orders</a>
                      </div>                      
                    </li>';
                            break;

                    }

                    echo '<li class="nav-item ';
                    echo ($active == "logout") ? "active" : "";
                    echo '">
                  <a class="nav-link" href="?content=user&action=logout">Log out</a>
                </li>';
                } else {
                    echo '<li class="nav-item ';
                    echo ($active == "register") ? "active" : "";
                    echo '">
                  <a class="nav-link" href="./index.php?content=pages/register-page">Register</a>
                </li>
                <li class="nav-item ';
                    echo ($active == "login") ? "active" : "";
                    echo '">
                  <a class="nav-link" href="./index.php?content=pages/login-page">Log in</a>
                </li>';
                }
                ?>
            </ul>
        </div>

    </div>
</nav>
