<?php

require_once '/config/autoload.php';

$dotenv = new Dotenv\Dotenv('./');
$dotenv->load();

require_once '/config/yaml_parse.php';
