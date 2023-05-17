<?php

use api\OrderController;
use api\SecurityFunctions;

include 'api/SecurityFunctions.php';
include 'api/OrderController.php';

$functions = new SecurityFunctions();
$functions->is_authorised(["customer"]);

$object = new OrderController();

// Insert Record in contact table
if (isset($_POST['submit'])) {
    $object->postOrder($_POST);
//    var_dump($object, exit());
}else {
    echo "Error executing query";
}
?>


<div class="bg-image">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <form method="POST" action="index.php?content=pages/customer/add-order&user_id=<?php echo $_SESSION['id']; ?>">
                    <div class="card">
                        <div class="text-center signupHeader">
                            <h1 id="signupHeader">Add order!</h1>
                            <label for="signupHeader">okay</label>
                        </div>
                        <div class="mb-3">
                            <label for="inputSurname" class="form-label">Order date:</label>
                            <input type="date" required class="form-control" id="inputSurname" placeholder="Doe"
                                   name="order_date" value="<?php echo date('Y-m-d'); ?>" disabled>
                        </div>

                        <div class="input-group mb-3">
                            <label for="inputEmail" class="form-label float-left">order price:</label>
                            <span class="input-group-text" id="basic-addon1">€</span>
                            <input type="number" required class="form-control" id="order_price"
                                   aria-describedby="order_price" placeholder="56" name="order_price">
                        </div>
                        <div class="mb-3">
                            <label for="inputAddress" class="form-label">quantity of products:</label>
                            <input type="number" required class="form-control" id="inputAddress"
                                   aria-describedby="emailHelp" placeholder="20" name="quantity">
                        </div>

                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>"/>
                        <input type="hidden" name="userrole" value="<?php echo $_SESSION['userrole']; ?>">

                        <input type="submit" name="submit" class="btn btn-primary" value="Add order"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

