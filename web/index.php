<?php
define('APP_ROOT_DIR', __DIR__  . '/../');
require_once APP_ROOT_DIR . 'vendor/autoload.php';

ini_set('display_errors', false);


/* FIXME - move to a normal class :) */
function handleShutdown() {

    if (($error = error_get_last())) {
        if(!headers_sent()) {
            header("HTTP/1.0 500  Internal Server Error");
        }
        $conf = \Core\Helpers::config();
        if($conf->app->env == 'prod') {
            echo "Internal Server Error (500)";
            exit();
        }
        echo "<h3>Fatal Error</h3>";
        echo "<pre>";
        print_r($error);
        echo "</pre>";
        exit();
    }
}
register_shutdown_function('handleShutdown');



$app = new Core\Application();
$app->run();

