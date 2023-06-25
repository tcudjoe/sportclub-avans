<?php

include './api/LoginController.php';

use api\LoginController;

//
$object = new LoginController();
//
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $object->login($email, $password);
}

?>

<style type="text/css">
    .card {
        min-height: 200px !important;
        padding: 50px
    }
</style>

<div class="container loginForm">
    <div class="card">

        <form action="./index.php?content=pages/login-page" method="POST">
            <h1>Admin Login</h1>
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Email:</label>
                <input name="email" type="email" class="form-control" placeholder="john@doe.com"
                       id="exampleInputUsername1"
                       aria-describedby="usernameHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password:</label>
                <input name="password" type="password" placeholder="***********" class="form-control"
                       id="exampleInputPassword1">
            </div>
            <button type="submit" name="submit" class="btn btn-login">Submit</button>
        </form>
    </div>
</div>
