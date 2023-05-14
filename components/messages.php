<?php

$alert = (isset($_GET["alert"])) ? $_GET["alert"] : "default";
$id = (isset($_GET["id"])) ? $_GET["id"] : "";
$pwh = (isset($_GET["pwh"])) ? $_GET["pwh"] : "";
$username = (isset($_GET["username"])) ? $_GET["username"] : "";

switch ($alert) {
    case 'emailexists':
        header("Refresh: 3.5; ./index.php?content=pages/login-page");
        echo '<div class="alert alert-warning text-center container" role="alert">
                    Email already exists. You are being redirected to the login page.
                  </div>';
        break;

    case 'password-mismatch':
        header("Refresh: 3.5; ./index.php?content=pages/register-page");
        echo '<div class="alert alert-warning text-center container" role="alert">
                    Passwords did not match. Try again.
                  </div>';
        break;

    case 'empty-field':
        header("Refresh: 3.5; ./index.php?content=pages/register-page");
        echo '<div class="alert alert-warning text-center container" style="color: white; margin-top: 50px;" role="alert">
                    All fields should be filled.
                  </div>';
        break;

    case 'register-success':
        header("Refresh: 3.5; ./index.php?content=pages/login-page");
        echo '<div class="alert alert-success text-center container" role="alert">
                    You have registered successfully.
                  </div>';
        break;

    case 'register-error':
        header("Refresh: 3.5; ./index.php?content=pages/register-page");
        echo '<div class="alert alert-danger text-center container" role="alert">
                    Something went wrong. Please try again..
                  </div>';
        break;

    case 'login-error':
        header("Refresh: 3.5; ./index.php?content=pages/login-page");
        echo '<div class="alert alert-warning text-center container" role="alert">
                    The email or password was incorrect. Please try again..-
                  </div>';
        break;

    case 'auth-error':
        header("Refresh: 3.5; ./index.php?content=pages/login-page");
        echo '<div class="alert alert-danger text-center container" role="alert">
                    You are not authorized to access this page.
                    <br>
                    You are being redirected to the login page.
                  </div>';
        break;

    case 'invalid-request':
        header("Refresh: 3.5; ./index.php?content=pages/home");
        echo '<div class="alert alert-warning text-center container" role="alert">
                    404 error
                  </div>';
        break;

    case 'logout-success':
        header("Refresh: 3.5; ./index.php?content=pages/home");
        echo '<div class="alert alert-success text-center container" role="alert">
                    You have been successfully logged out.
                  </div>';
        break;

    case 'form-success-employee':
        header("Refresh: 3.5; url=./index.php?content=pages/employee/orders&user_id=" . $id);
        echo '<div class="alert alert-success text-center container" role="alert">
                You have successfully added an order.
              </div>';
        break;

    case 'form-error-employee':
        header("Refresh: 3.5; url=./index.php?content=pages/employee/orders&user_id=" . $id);
        echo '<div class="alert alert-success text-center container" role="alert">
               Something went wrong, try again later.
          </div>';
        break;

    case 'order-deleted-success-employee':
        header("Refresh: 3.5; url=./index.php?content=pages/employee/orders&user_id=" . $id);
        echo '<div class="alert alert-success text-center container" role="alert">
                You have successfully added an order.
              </div>';
        break;

    case 'order-deleted-error-employee':
        header("Refresh: 3.5; url=./index.php?content=pages/employee/orders&user_id=" . $id);
        echo '<div class="alert alert-success text-center container" role="alert">
               Something went wrong, try again later.
          </div>';
        break;

}
