<?php
namespace Core;
use Controllers;

class Application {
    public static $superGlobals = '';

    public function __construct() {
        session_start();
        self::$superGlobals = array(
            '_GET' => $_GET,
           '_POST' => $_POST,
            '_SERVER' => $_SERVER,
            '_SESSION' => $_SESSION,
            '_COOKIE' => $_COOKIE
        );
    }

    public function test() {}

    public function run() {
        $router = new Router();
        $route = $router->getRoute(self::$superGlobals['_SERVER']);

        $className = $route['class'];
        $class = "Controllers\\$className";

        $app = new $class;


        call_user_func( array( $app, $route['action'] ) );
    }
}