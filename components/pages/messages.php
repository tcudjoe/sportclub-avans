<?php

$alert = (isset($_GET["alert"])) ? $_GET["alert"] : "default";
$id = (isset($_GET["id"])) ? $_GET["id"] : "";
$pwh = (isset($_GET["pwh"])) ? $_GET["pwh"] : "";
$username = (isset($_GET["username"])) ? $_GET["username"] : "";

switch ($alert) {
    case 'emailexists':
        header("Refresh: 3.5; ./index.php?content=pages/login-page");
        ?>
        <div class="alert alert-warning text-center container" role="alert">
            Email already exists. You are being redirected to the login page.
        </div>
        <?php
        break;

    case 'password-mismatch':
        header("Refresh: 3.5; ./index.php?content=pages/register-page");
        ?>
        <div class="alert alert-warning text-center container" role="alert">
            Passwords did not match. Try again.
        </div>
        <?php
        break;

    case 'empty-field':
        header("Refresh: 3.5; ./index.php?content=pages/register-page");
        ?>

        <div class="alert alert-warning text-center container" style="color: white; margin-top: 50px;" role="alert">
            All fields should be filled.
        </div>
        <?php
        break;

    case 'register-success':
        header("Refresh: 3.5; ./index.php?content=pages/login-page");
        ?>

        <div class="alert alert-success text-center container" role="alert">
            You have registered successfully.
        </div>
        <?php
        break;

    case 'register-error':
        header("Refresh: 3.5; ./index.php?content=pages/register-page");
        ?>

        <div class="alert alert-danger text-center container" role="alert">
            Something went wrong. Please try again..
        </div>
        <?php
        break;

    case 'login-error':
        header("Refresh: 3.5; ./index.php?content=pages/login-page");
        ?>

        <div class="alert alert-warning text-center container" role="alert">
            The email or password was incorrect. Please try again..-
        </div>
        <?php
        break;

    case 'auth-error':
        header("Refresh: 3.5; ./index.php?content=pages/login-page");
        ?>

        <div class="alert alert-danger text-center container" role="alert">
            You are not authorized to access this page.
            <br>
            You are being redirected to the login page.
        </div>
        <?php
        break;

    case 'invalid-request':
        header("Refresh: 3.5; ./index.php?content=pages/home");
        ?>

        <div class="alert alert-warning text-center container" role="alert">
            404 error
        </div>
        <?php
        break;

    case 'logout-success':
        header("Refresh: 3.5; ./index.php?content=pages/home");
        ?>

        <div class="alert alert-success text-center container" role="alert">
            You have been successfully logged out.
        </div>
        <?php
        break;

    case 'form-success-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/orders&user_id=" . $id);
        ?>

        <div class="alert alert-success text-center container" role="alert">
            You have successfully added an order.
        </div>
        <?php
        break;

    case 'form-error-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/orders");
        ?>
        <div class="alert alert-success text-center container" role="alert">
            Something went wrong, try again later.
        </div>
        <?php
        break;

    case 'order-deleted-success-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/orders");
        ?>

        <div class="alert alert-success text-center container" role="alert">
            You have successfully added an order.
        </div>
        <?php
        break;

    case 'order-deleted-error-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/orders");
        ?>

        <div class="alert alert-success text-center container" role="alert">
            Order was not deleted, try again.
        </div>
        <?php
        break;
    case 'update-order-success-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/orders");
        ?>

        <div class="alert alert-success text-center container" role="alert">
            Order succesfully updated.
        </div>
        <?php
        break;

    case 'update-order-error-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/orders");
        ?>

        <div class="alert alert-danger text-center container" role="alert">
            Order was not updated, try again later.
        </div>
        <?php
        break;

    case 'create-user-success-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/customers");
        ?>
        <div class="alert alert-success text-center container" role="alert">
            User created successfully.
        </div>
        <?php
        break;

    case 'create-user-error-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/users");
        ?>
        <div class="alert alert-warning text-center container" role="alert">
            user was not created, try again later.
        </div>
        <?php
        break;

    case 'update-user-error-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/users&user_id=" . $id);
        ?>
        <div class="alert alert-warning text-center container" role="alert">
            Something went wrong while updating the user, try again later.
        </div>
        <?php
        break;

    case 'update-user-success-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/users&user_id=" . $id);
        ?>
        <div class="alert alert-warning text-center container" role="alert">
            User successfully updated.
        </div>
        <?php
        break;

    case 'delete-user-success-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/users");
        ?>
        <div class="alert alert-warning text-center container" role="alert">
            User successfully deleted.
        </div>
        <?php
        break;

    case 'delete-user-error-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/users");
        ?>
        <div class="alert alert-warning text-center container" role="alert">
            User not updated. try again.
        </div>
        <?php
        break;

    case 'delete-product-error-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/users");
        ?>

        <div class="alert alert-warning text-center container" role="alert">
            Product not deleted . try again.
        </div>
        <?php
        break;

    case 'delete-product-success-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/users");
        ?>

        <div class="alert alert-success text-center container" role="alert">
            good
        </div>
        <?php
        break;

    case 'create-product-success-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/users");
        ?>

        <div class="alert alert-success text-center container" role="alert">
            good good
        </div>
        <?php
        break;

    case 'create-product-error-employee':
        header("Refresh: 3.5; ./index.php?content=pages/employee/users");
        ?>

        <div class="alert alert-danger text-center container" role="alert">
            bad
        </div>
        <?php
        break;

    case 'form-success-customer':
        header("Refresh: 3.5; ./index.php?content=pages/customer/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-success text-center container" role="alert">
            good
        </div>
        <?php
        break;

    case 'form-error-customer':
        header("Refresh: 3.5; ./index.php?content=pages/customer/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-danger text-center container" role="alert">
            bad
        </div>
        <?php
        break;

    case 'form-success-admin':
        header("Refresh: 3.5; ./index.php?content=pages/admin/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-success text-center container" role="alert">
            good
        </div>
        <?php
        break;

    case 'form-error-admin':
        header("Refresh: 3.5; ./index.php?content=pages/admin/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-danger text-center container" role="alert">
            bad
        </div>
        <?php
        break;

    case 'delete-order-success-admin':
        header("Refresh: 3.5; ./index.php?content=pages/admin/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-success text-center container" role="alert">
            good
        </div>
        <?php
        break;

    case 'delete-order-error-admin':
        header("Refresh: 3.5; ./index.php?content=pages/admin/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-success text-center container" role="alert">
            bad
        </div>
        <?php
        break;

    case 'delete-order-success-customer':
        header("Refresh: 3.5; ./index.php?content=pages/customer/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-success text-center container" role="alert">
            good
        </div>
        <?php
        break;

    case 'delete-order-error-admin':
        header("Refresh: 3.5; ./index.php?content=pages/admin/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-success text-center container" role="alert">
            bad
        </div>
        <?php
        break;

    case 'update-order-error-customer':
        header("Refresh: 3.5; ./index.php?content=pages/customer/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-success text-center container" role="alert">
            bad
        </div>
        <?php
        break;

    case 'update-order-success-customer':
        header("Refresh: 3.5; ./index.php?content=pages/customer/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-success text-center container" role="alert">
            good
        </div>
        <?php
        break;

    case 'update-order-error-admin':
        header("Refresh: 3.5; ./index.php?content=pages/customer/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-warning text-center container" role="alert">
            bad
        </div>
        <?php
        break;

    case 'update-order-success-admin':
        header("Refresh: 3.5; ./index.php?content=pages/customer/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-success text-center container" role="alert">
            good
        </div>
        <?php
        break;

    case 'create-product-success-admin':
        header("Refresh: 3.5; ./index.php?content=pages/admin/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-success text-center container" role="alert">
            good
        </div>
        <?php
        break;

    case 'create-product-error-admin':
        header("Refresh: 3.5; ./index.php?content=pages/admin/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-warning text-center container" role="alert">
            bad
        </div>
        <?php
        break;

    case 'create-user-success-admin':
        header("Refresh: 3.5; ./index.php?content=pages/admin/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-success text-center container" role="alert">
            good
        </div>
        <?php
        break;

    case 'create-user-error-admin':
        header("Refresh: 3.5; ./index.php?content=pages/admin/orders&user_id=" . $_SESSION['id']);
        ?>
        <div class="alert alert-warning text-center container" role="alert">
            bad
        </div>
        <?php
        break;


}
