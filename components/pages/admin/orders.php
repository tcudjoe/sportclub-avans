<?php
include 'api/SecurityFunctions.php';
$functions = new \api\SecurityFunctions();

$functions->is_authorised(["admin"]);
echo "Orders admin works!";