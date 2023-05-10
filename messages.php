<?php

$alert = (isset($_GET["alert"])) ? $_GET["alert"] : "default";
$id = (isset($_GET["id"])) ? $_GET["id"] : "";
$pwh = (isset($_GET["pwh"])) ? $_GET["pwh"] : "";
$username = (isset($_GET["username"])) ? $_GET["username"] : "";

switch ($alert) {
    case 'emailexists':
        echo '<div class="alert text-center container" role="alert">
                    Email already exists. You are being redirected to the login page.
                  </div>';
        header("Refresh: 3.5; ./index.php?content=pages/login-page");
        break;

    case 'password-mismatch':
        echo '<div class="alert text-center container" role="alert">
                    Passwords did not match. Try again.
                  </div>';
        header("Refresh: 3.5; ./index.php?content=pages/register-page");
        break;

    case 'empty-field':
        echo '<div class="alert alert-warning text-center container" style="color: white; margin-top: 50px;" role="alert">
                    All fields should be filled.
                  </div>';
        header("Refresh: 3.5; ./index.php?content=pages/register-page");
        break;
    case 'register-success':
        echo '<div class="alert alert-success text-center container" role="alert">
                    You have registered successfully.
                  </div>';
        header("Refresh: 3.5; ./index.php?content=pages/home");
        break;
    case 'register-error':
        echo '<div class="alert alert-danger text-center container" role="alert">
                    Something went wrong. Please try again..
                  </div>';
        header("Refresh: 3.5; ./index.php?content=pages/home");
        break;
    case 'auth-error':
        echo '<div class="alert alert-danger text-center container" role="alert">
                    You are not authorized to access this page.
                    <br>
                    You are being redirected to the login page.
                  </div>';
        header("Refresh: 3.5; ./index.php?content=pages/login-page");
        break;
    case 'invalid-request':
        echo '<div class="alert alert-warning text-center container" role="alert">
                    404 error. Please try again
                  </div>';
        header("Refresh: 3.5; ./index.php?content=pages/home");
        break;
}

