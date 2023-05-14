<?php
use api\SecurityFunctions;
use api\UserController;

include 'api/SecurityFunctions.php';
require_once 'api/UserController.php';

$functions = new SecurityFunctions();
$functions->is_authorised(["employee"]);

$objectUser = new UserController();
$userrole = $objectUser->getUsers();

if (isset($_POST['submit'])) {
    $objectUser->putCustomer();
}
?>

<div class="bg-image">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <form method="POST" action="index.php?content=pages/employee/customers">
                    <div class="card">
                        <div class="text-center signupHeader">
                            <h1 id="signupHeader">Update user</h1>
                            <label for="signupHeader">okay</label>
                        </div>
                        <?php
                        if(isset($_GET['id']) && !empty($_GET['id'])){
                            $editCustomer = $_GET['id'];
                            $customer = $objectUser->getUserById($editCustomer)[0];
                        ?>
                        <div class="mb-3">
                            <label for="inputFirstname" class="form-label">First Name:</label>
                            <input type="text" id="firstname" class="form-control" placeholder="John" name="firstname"
                                   required value="<?php echo $customer['firstname'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="inputSurname" class="form-label">Surname:</label>
                            <input type="text" required class="form-control" id="inputSurname" placeholder="Doe"
                                   name="surname" value="<?php echo $customer['surname'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label float-left">Email address:</label>
                            <input type="email" required class="form-control" id="inputEmail"
                                   aria-describedby="emailHelp" placeholder="john@doe.com" name="email" value="<?php echo $customer['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="inputAddress" class="form-label float-left">Address:</label>
                            <input type="text" required class="form-control" id="inputAddress"
                                   aria-describedby="emailHelp" placeholder="john@doe.com" name="address" value="<?php echo $customer['address'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="inputZipcode" class="form-label float-left">Zipcode:</label>
                            <input type="text" required class="form-control" id="inputZipcode"
                                   aria-describedby="emailHelp" placeholder="john@doe.com" name="zipcode" value="<?php echo $customer['zipcode'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="inputCityname" class="form-label float-left">Cityname:</label>
                            <input type="text" required class="form-control" id="inputCityname"
                                   aria-describedby="emailHelp" placeholder="john@doe.com" name="cityname" value="<?php echo $customer['cityname'] ?>">
                        </div>
                            <div class="mb-3">
                                <select class="form-select" aria-label="Default select example" name="userrole">
                                    <option <?php if(isset($customer['userrole']) && $customer['userrole'] === "admin") {echo "selected"; } ?> value="admin">Admin</option>
                                    <option <?php if(isset($customer['userrole']) && $customer['userrole'] === "customer") {echo "selected"; } ?> value="customer">Customer</option>
                                    <option <?php if(isset($customer['userrole']) && $customer['userrole'] === "employee") {echo "selected"; } ?> value="employee">Employee</option>
                                </select>
                            </div>

                            <div class="mb-3">
                            <label for="inputPassword" class="form-label float-left">Password:</label>
                            <input type="password" class="form-control" id="inputDateOfBirth"
                                   aria-describedby="emailHelp"
                                   name="password" value="<?php echo $customer['password'] ?>">
                        </div>
                        <input type="hidden" value="<?php echo $customer['id']; ?>" name="id"/>
                        <?php } ?>
                        <input type="submit" name="submit" class="btn btn-primary" value="Sign up"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

