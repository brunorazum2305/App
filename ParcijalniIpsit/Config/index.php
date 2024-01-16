<?php

require_once 'Config.php';
require_once 'Autoload.php';
require_once 'DatabaseConnection.php';

try {
    $dbConnection = DatabaseConnection::getInstance($databaseConfig);
    $pdo = $dbConnection->getConnection();

    echo "Database connection established successfully.";

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

?>
