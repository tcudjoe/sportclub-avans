<?php

use api\OrderController;
use api\SecurityFunctions;
use api\UserController;

include 'api/SecurityFunctions.php';
include 'api/OrderController.php';
require_once 'api/UserController.php';

$functions = new SecurityFunctions();
$functions->is_authorised(["employee"]);

$object = new OrderController();
$objectUser = new UserController();

$users = $objectUser->getUsers();

// Insert Record in contact table
if (isset($_POST['submit'])) {
    $object->postOrder($_POST);
}
?>


<div class="bg-image">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <form method="POST" action="index.php?content=pages/employee/add-order">
                    <div class="card">
                        <div class="text-center signupHeader">
                            <h1 id="signupHeader">Add order!</h1>
                            <label for="signupHeader">yup</label>
                        </div>
                        <div class="mb-3">
                            <label for="inputFirstname" class="form-label">User id:</label>
                            <select class="form-select" aria-label="Default select example" name="user_id">
                                <option selected>Open this select menu</option>
                                <?php
                                foreach ($users as $id => $user) {
                                    if($user['userrole'] == "customer"){
                                    ?>
                                    <option
                                        value="<?php echo  $user['id'] ?>"><?php echo $user['id']; ?></option>
                                <?php }} ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="inputSurname" class="form-label">Order date:</label>
                            <input type="date" required class="form-control" id="inputSurname" placeholder="Doe"
                                   name="order_date">
                        </div>
                        <div class="input-group mb-3">
                            <label for="inputEmail" class="form-label float-left">order price:</label>
                            <span class="input-group-text" id="basic-addon1">€</span>
                            <input type="number" required class="form-control" id="inputEmail"
                                   aria-describedby="emailHelp" placeholder="john@doe.com" name="order_price">
                        </div>
                        <div class="mb-3">
                            <label for="inputAddress" class="form-label">quantity of products:</label>
                            <input type="number" required class="form-control" id="inputAddress"
                                   aria-describedby="emailHelp" placeholder="john@doe.com" name="quantity">
                        </div>
                        <div class="input-group mb-3">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Add order"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>