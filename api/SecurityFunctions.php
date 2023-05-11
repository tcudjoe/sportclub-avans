<?php

namespace api;

class SecurityFunctions
{
    private $conn;

    public function __construct()
    {
        $db = new connectDb();
        $this->conn = $db->conn;
    }

    function sanitize($raw_data) {
        $data = htmlspecialchars($raw_data);
        $data = mysqli_real_escape_string($this->conn, $data);
        $data = trim($data);
        return $data;
    }


    function mk_password_hash_from_microtime() {
        $mut = microtime();
        $time = explode(" ", $mut);

        $password = $time[1] * $time[0];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $hour = mktime(1, 0, 0, 1, 1, 1970);
        $date_formatted = date("d-m-Y", ($time[1] + $hour));
        $time_formatted = date("H:i:s", ($time[1] + $hour));

        return array("password_hash" => $password_hash,
            "date"          => $date_formatted,
            "time"          => $time_formatted);
    }

    function is_authorised($userroles) {
        if (!isset($_SESSION["id"])){
            // var_dump($_SESSION["id"]);exit();
            return header("Location: ./index.php?content=messages&alert=auth-error");
        }elseif (!in_array($_SESSION["userrole"], $userroles)) {
            return header("Location: ./index.php?content=messages&alert=auth-error-user");
        }else {
            return true;
        }
    }
}