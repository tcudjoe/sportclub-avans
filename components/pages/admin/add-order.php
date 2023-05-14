<?php
include 'api/SecurityFunctions.php';
$functions = new \api\SecurityFunctions();

$functions->is_authorised(["admin"]);
?>

<div class="bg-image">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <form method="POST" action="index.php?content=pages/register-page">
                    <div class="card">
                        <div class="text-center signupHeader">
                            <h1 id="signupHeader">Be a part of DSM Supermarkt!</h1>
                            <label for="signupHeader">Sign up now to order groceries</label>
                        </div>
                        <div class="mb-3">
                            <label for="inputFirstname" class="form-label">First Name:</label>
                            <input type="text" id="firstname" class="form-control" placeholder="John" name="firstname"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label for="inputSurname" class="form-label">Surname:</label>
                            <input type="text" required class="form-control" id="inputSurname" placeholder="Doe"
                                   name="surname">
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label float-left">Email address:</label>
                            <input type="email" required class="form-control" id="inputEmail"
                                   aria-describedby="emailHelp" placeholder="john@doe.com" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="inputAddress" class="form-label float-left">Address:</label>
                            <input type="text" required class="form-control" id="inputAddress"
                                   aria-describedby="emailHelp" placeholder="john@doe.com" name="address">
                        </div>
                        <div class="mb-3">
                            <label for="inputZipcode" class="form-label float-left">Zipcode:</label>
                            <input type="text" required class="form-control" id="inputZipcode"
                                   aria-describedby="emailHelp" placeholder="john@doe.com" name="zipcode">
                        </div>
                        <div class="mb-3">
                            <label for="inputCityname" class="form-label float-left">Cityname:</label>
                            <input type="text" required class="form-control" id="inputCityname"
                                   aria-describedby="emailHelp" placeholder="john@doe.com" name="cityname">
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label float-left">Password:</label>
                            <input type="password" class="form-control" id="inputDateOfBirth"
                                   aria-describedby="emailHelp"
                                   name="password">
                        </div>
                        <div class="mb-3">
                            <label for="inputConfirmPassword" class="form-label float-left">Re-enter Password:</label>
                            <input type="password" class="form-control" id="inputDateOfBirth"
                                   aria-describedby="emailHelp"
                                   name="confirmPassword">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                            <label class="form-label text-center">By clicking on sign up, you agree to our terms &
                                conditions.</label>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Sign up"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
