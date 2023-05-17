<?php
use api\SecurityFunctions;
use api\UserController;

include 'api/SecurityFunctions.php';
$functions = new SecurityFunctions();

$functions->is_authorised(["employee"]);


require_once './api/OrderController.php';


$object = new UserController();

// Check if the delete action is triggered
if (isset($_GET['action']) && $_GET['action'] === 'deleteUser') {
    // Check if the order ID is provided
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // Call the deleteOrder method
        $object->deleteUser($id);
        // Redirect to the appropriate page after deletion
        exit();
    }
}
?>

<div class="container">
    <div class="row">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Customer table</h1>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">id #</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Surname</th>
                            <th scope="col">email</th>
                            <th scope="col">address</th>
                            <th scope="col">zipcode</th>
                            <th scope="col">cityname</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $customers = $object->getCustomers();
                        foreach ($customers as $id => $customer) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $customer['id'] ?></th>
                                <td><?php echo $customer['firstname'] ?></td>
                                <td><?php echo $customer['surname'] ?></td>
                                <td><?php echo $customer['email'] ?></td>
                                <td><?php echo $customer['address'] ?></td>
                                <td><?php echo $customer['zipcode'] ?></td>
                                <td><?php echo $customer['cityname'] ?></td>
                                <td>
                                    <a href="?content=pages/employee/customers&action=deleteCustomer&id=<?php echo $customer['id'] ?>
                                        <i aria-hidden="true" class="fa fa-ban"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="/index.php?content=pages/employee/edit-customer&id=<?php echo $customer['id']?>">
                                        <i aria-hidden="true" class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <a href="./index.php?content=pages/employee/add-customer">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary"  type="button">Add user</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

