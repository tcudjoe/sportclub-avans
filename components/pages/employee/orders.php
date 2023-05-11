<?php
include 'api/SecurityFunctions.php';
$functions = new \api\SecurityFunctions();

$functions->is_authorised(["employee"]);
echo "Orders employee works!";