<?php
use api\SecurityFunctions;
include 'api/SecurityFunctions.php';
$functions = new SecurityFunctions();

$functions->is_authorised(["employee"]);

use api\OrderController;

require_once './api/OrderController.php';

$object = new OrderController();
$orders = $object->getOrders();
?>

<div class="container">
    <div class="row">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order table</h1>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Order #</th>
                            <th scope="col">Order date</th>
                            <th scope="col">Nr of items</th>
                            <th scope="col">User id</th>
                            <th scope="col">Total price</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $orders = $object->getOrders();
                        foreach ($orders as $id => $order) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $order['id'] ?></th>
                                <td><?php echo $order['order_date'] ?></td>
                                <td><?php echo $order['order_quantity'] ?></td>
                                <td><?php echo $order['user_id'] ?></td>
                                <td>€<?php echo $order['order_price'] ?></td>
                                <td>
                                    <a href="./index.php?content=pages/employee/delete-order&id=<?php echo $order['id'] ?>
                                        <i aria-hidden="true" class="fa fa-ban"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="/index.php?content=pages/employee/edit-order&id=<?php echo $order['id']?>">
                                        <i aria-hidden="true" class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <a href="./index.php?content=pages/employee/add-order&user_id='<?php echo $_SESSION["id"] ?>'">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="button">Add new booking</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
