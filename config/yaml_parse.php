<?php

use Symfony\Component\Yaml\Yaml;

$phinx = Yaml::parse(file_get_contents('./phinx.yml'));

$db_config = $phinx['environments'][getenv('ENV')];

putenv('DB_ADAPTER=' . $db_config['adapter']);
putenv('DB_CHARSET=' . $db_config['charset']);

putenv('DB_HOST=' . $db_config['host']);
putenv('DB_USER=' . $db_config['user']);
putenv('DB_PASS=' . $db_config['pass']);
putenv('DB_NAME=' . $db_config['name']);
putenv('DB_PORT=' . $db_config['port']);
