<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once 'config.php';

require_once 'loader.php';

// Run the application!
$app = new MainController();

$app->run();
