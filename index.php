<?php

require_once '/config/init.php';

use src\Routes;

$router = new Routes();
$router->serve();