<?php

use App\Core\Application;

define('ROOT', realpath(__DIR__ . '/..'));

require_once ROOT . '/vendor/autoload.php';
require_once ROOT . '/config/routes.php';

$application = new Application();
$application->run();