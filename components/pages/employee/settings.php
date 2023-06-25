<?php

include 'api/SecurityFunctions.php';
$functions = new SecurityFunctions();

$functions->is_authorised(["employee"]);

echo "Settings page works";