<?php

namespace api;
require_once './api/ConnectDb.php';
require_once './api/SecurityFunctions.php';

use function SecurityFunctions\sanitize;

class LoginController
{
    private $id;
    private $conn;

    public function __construct()
    {
        $db = new connectDb();
        $this->conn = $db->conn;
    }

    public function login($email, $password)
    {
        $securityFunctions = new SecurityFunctions();

        $email = $securityFunctions->sanitize($email);
        $password = $securityFunctions->sanitize($password);
        $id = $securityFunctions->sanitize($this->id);

        if (empty($email) || empty($password)) {
            header("Location: ./index.php?content=messages&alert=no-login");
            exit();
        } else {
            $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
            $result = mysqli_query($this->conn, $sql);

            if (!mysqli_num_rows($result)) {
                // Username unknown
                header("Location: ./index.php?content=messages&alert=login-error");
                exit();
            } else {
                $record = mysqli_fetch_assoc($result);

                if ($password !== $record["password"]) {
                    // No password match
                    header("Location: ./index.php?content=messages&alert=error-login&email=$email&id=$id");
                    exit();
                } else {
                    $_SESSION["id"] = $record["id"];
                    $_SESSION["userrole"] = $record["userrole"];

                    switch ($record["userrole"]) {
                        case 'customer':
                            $redirectUrl = "./index.php?content=pages/customer/dashboard&user_id=" . $record["id"];
                            header("Location: " . $redirectUrl);
                            exit();
                            break;

                        case 'employee':
                            $redirectUrl = "./index.php?content=pages/employee/dashboard&user_id=" . $record["id"];
                            header("Location: " . $redirectUrl);
                            exit();
                            break;

                        case 'admin':
                            $redirectUrl = "./index.php?content=pages/admin/dashboard&user_id=" . $record["id"];
                            header("Location: " . $redirectUrl);
                            exit();
                            break;
                    }
                }
            }
        }
    }


}