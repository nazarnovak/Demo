<?php

// Entry point

// Composer's autoloader
require '../vendor/autoload.php';

$app = new \Core\App();
$app->init();
$app->run();
