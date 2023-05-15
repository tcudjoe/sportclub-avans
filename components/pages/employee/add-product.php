<?php
use api\SecurityFunctions;
use api\UserController;

include 'api/SecurityFunctions.php';
$functions = new SecurityFunctions();
$object = new \api\ProductController();

$functions->is_authorised(["employee"]);

// Insert Record in contact table
if (isset($_POST['submit'])) {
    $object->postProduct($_POST);
}
?>

<div class="bg-image">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <form method="POST" action="index.php?content=pages/employee/products">
                    <div class="card">
                        <div class="text-center signupHeader">
                            <h1 id="signupHeader">Be a part of DSM Supermarkt!</h1>
                            <label for="signupHeader">Sign up now to order groceries</label>
                        </div>
                        <div class="mb-3">
                            <label for="inputFirstname" class="form-label">Name:</label>
                            <input type="text" id="firstname" class="form-control" placeholder="John" name="name"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label for="floatingTextarea2">Description</label>
                            <textarea class="form-control" name="description" placeholder="description" id="floatingTextarea2" style="height: 100px"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="inputAddress" class="form-label float-left">img url:</label>
                            <input type="text" required class="form-control" id="inputAddress"
                                   aria-describedby="emailHelp" placeholder="john@doe.com" name="img_address">
                        </div>
                        <div class="mb-3">
                            <label for="inputZipcode" class="form-label float-left">price:</label>
                            <input type="number" required class="form-control" id="inputZipcode"
                                   aria-describedby="emailHelp" placeholder="john@doe.com" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="inputCityname" class="form-label float-left">quantity:</label>
                            <input type="number" required class="form-control" id="inputCityname"
                                   aria-describedby="emailHelp" placeholder="john@doe.com" name="quantity">
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label float-left">Category id:</label>
                            <select class="form-select" name="category" aria-label="Default select example">
                                <?php
                                $categories = $object->getCategory();
                                if (!empty($categories)) {
                                foreach ($categories as $category) {
                                        ?>
                                        <option
                                            value="<?php echo $category['id']?>"><?php echo $category['name']; ?></option>
                                    <?php } }?>
                            </select>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Add product"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

