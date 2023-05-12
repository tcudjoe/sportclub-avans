<?php
use api\SecurityFunctions;
use api\UserController;

include 'api/SecurityFunctions.php';
$functions = new SecurityFunctions();

$functions->is_authorised(["admin"]);


require_once './api/OrderController.php';

$object = new UserController();
$users = $object->getUsers();
?>

<div class="container">
    <div class="row">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User table</h1>
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
                        $users = $object->getUsers();
                        foreach ($users as $id => $user) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $user['id'] ?></th>
                                <td><?php echo $user['firstname'] ?></td>
                                <td><?php echo $user['surname'] ?></td>
                                <td><?php echo $user['email'] ?></td>
                                <td><?php echo $user['address'] ?></td>
                                <td><?php echo $user['zipcode'] ?></td>
                                <td><?php echo $user['cityname'] ?></td>
                                <td><?php echo $user['cityname'] ?></td>
                                <td>
                                    <a href="./index.php?content=pages/admin/delete-user&id=<?php echo $user['id'] ?>
                                        <i aria-hidden="true" class="fa fa-ban"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="/index.php?content=pages/admin/edit-user&id=<?php echo $user['id']?>">
                                        <i aria-hidden="true" class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <a href="./index.php?content=pages/admin/add-user">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary"  type="button">Add user</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

