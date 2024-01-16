<?php

require_once 'Config.php';
require_once 'Autoload.php';

Autoloader::register();

try {
    $dbConnection = DatabaseConnection::getInstance($databaseConfig);
    $pdo = $dbConnection->getConnection();


} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

?>

