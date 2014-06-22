<?php
define('APP_ROOT_DIR', __DIR__  . '/../');
require_once APP_ROOT_DIR . 'vendor/autoload.php';



$app = new Core\Application();
$app->run();

