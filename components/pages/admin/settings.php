<?php
use api\OrderController;
use api\SecurityFunctions;
use api\UserController;

include 'api/SecurityFunctions.php';
include 'api/OrderController.php';
require_once 'api/UserController.php';

$functions = new SecurityFunctions();
$functions->is_authorised(["admin"]);

echo "Settings page works";