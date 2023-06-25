<?php

use api\OrderController;
use api\SecurityFunctions;

include 'api/SecurityFunctions.php';
include 'api/OrderController.php';

$functions = new SecurityFunctions();
$functions->is_authorised(["customer"]);

echo "Settings page works";