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
            header("Location: /message.php?alert=no-login");
            exit();
        } else {
            $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
            $result = mysqli_query($this->conn, $sql);

            if (!mysqli_num_rows($result)) {
                // Username unknown
                header("Location: /message.php&alert=error-login");
                exit();
            } else {
                $record = mysqli_fetch_assoc($result);

                if ($password !== $record["password"]) {
                    // No password match
                    header("Location: /message.php?alert=error-login&email=$email&id=$id");
                    exit();
                } else {
                    $_SESSION["id"] = $record["id"];
                    $_SESSION["userrole"] = $record["userrole"];

                    switch ($record["userrole"]) {
                        case 'customer':
                            header("Location: ./index.php?content=pages/customer/dashboard");
                            exit();
                            break;

                        case 'employee':
                            header("Location: ./index.php?content=pages/employee/dashboard");
                            exit();
                            break;

                        case 'customer':
                            header("Location: ./index.php?content=pages/admin/dashboard");
                            exit();
                            break;
                    }
                }
            }
        }
    }

}