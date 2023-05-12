<?php
include 'api/SecurityFunctions.php';
$functions = new \api\SecurityFunctions();

$functions->is_authorised(["customer"]);
//echo "Orders customer works!";
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
                        <tr>
                            <th scope="row">328431</th>
                            <td>03/05/2023 12:30:00</td>
                            <td>03/05/2023 18:30:00</td>
                            <td>002305</td>
                            <td>027602</td>
                            <td>€650,45</td>
                            <td>
                                <a href="./index.php?content=pages/admin/orders&id=1">
                                    <i aria-hidden="true" class="fa fa-ban"></i>
                                </a>
                            </td>
                            <td>
                                <a href="/index.php?content=pages/admin/edit-booking&id=1">
                                    <i aria-hidden="true" class="fa fa-pencil-square-o"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="./index.php?content=pages/admin/orders/add-order">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary"  type="button">Add new booking</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

