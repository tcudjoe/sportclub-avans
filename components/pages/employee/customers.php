<?php
include 'api/SecurityFunctions.php';
$functions = new \api\SecurityFunctions();

$functions->is_authorised(["employee"]);
echo "Customers employee works!";