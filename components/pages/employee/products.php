<?php
use api\ProductController;

include 'api/SecurityFunctions.php';
$functions = new \api\SecurityFunctions();

$functions->is_authorised(["employee"]);


$object = new ProductController();
$products = $object->getProducts();
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
                            <th scope="col">Id #</th>
                            <th scope="col">name</th>
                            <th scope="col">Description</th>
                            <th scope="col">img_address</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">category id</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $products = $object->getProducts();
                        foreach ($products as $product) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $product['id'] ?></th>
                                <td><?php echo $product['name'] ?></td>
                                <td><?php echo mb_strimwidth($product['description'], 0, 20, "...")  ?></td>
                                <td><?php echo $product['img_address'] ?></td>
                                <td><?php echo $product['price'] ?></td>
                                <td><?php echo $product['quantity'] ?></td>
                                <td><?php echo $product['category_id'] ?></td>
                                <td>
                                    <a href="./index.php?content=pages/employee/delete-user&id=<?php echo $product['id'] ?>">
                                        <i aria-hidden="true" class="fa fa-ban"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="/index.php?content=pages/employee/edit-user&id=<?php echo $product['id'] ?>">
                                        <i aria-hidden="true" class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                    <a href="./index.php?content=pages/employee/add-user&user_id=<?php echo $_SESSION['id']; ?>">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary"  type="button">Add new booking</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

