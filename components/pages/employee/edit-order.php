<?php

use api\OrderController;
use api\SecurityFunctions;
use api\UserController;

require_once 'api/SecurityFunctions.php';
require_once 'api/UserController.php';

$functions = new SecurityFunctions();
$functions->is_authorised(["employee"]);

require_once 'api/OrderController.php';

$objectOrder = new OrderController();
// Fetch users
$objectUser = new UserController();
$users = $objectUser->getUsers();

if (isset($_POST['submit'])) {
    $objectOrder->putOrders();
}

?>

<div class="bg-image">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <form method="POST" action="index.php?content=pages/employee/add-order">
                    <div class="card">
                        <div class="text-center signupHeader">
                            <h1 id="signupHeader">Edit order!</h1>
                            <label for="signupHeader">yup</label>
                        </div>
                        <?php
                        if (isset($_GET['id']) && !empty($_GET['id'])) {
                            $editOrder = $_GET['id'];
                            $order = $objectOrder->getOrdersById($editOrder)[0];
                            ?>
                            <div class="mb-3">
                                <label for="inputAddress" class="form-label">user_id:</label>
                                <input type="number" required class="form-control" id="inputAddress"
                                       value="<?php echo $order['user_id'] ?>"
                                       aria-describedby="emailHelp" placeholder="john@doe.com" name="user_id">
                            </div>
                            <div class="mb-3">
                                <label for="inputSurname" class="form-label">Order date:</label>
                                <input type="date" required class="form-control" id="inputSurname" placeholder="Doe"
                                       name="order_date"
                                       value="<?php echo date('Y-m-d', strtotime($order['order_date'])) ?>">
                            </div>
                            <div class="input-group mb-3">
                                <label for="inputEmail" class="form-label float-left">order price:</label>
                                <span class="input-group-text" id="basic-addon1">€</span>
                                <input type="number" required class="form-control" id="inputEmail"
                                       value="<?php echo $order['order_price'] ?>"
                                       aria-describedby="emailHelp" placeholder="john@doe.com" name="order_price">
                            </div>
                            <div class="mb-3">
                                <label for="inputAddress" class="form-label">quantity of products:</label>
                                <input type="number" required class="form-control" id="inputAddress"
                                       value="<?php echo $order['order_quantity'] ?>"
                                       aria-describedby="emailHelp" placeholder="john@doe.com" name="quantity">
                            </div>
                        <?php } ?>
                        <input type="submit" name="submit" class="btn btn-primary" value="Add order"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>