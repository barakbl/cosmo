<?php

namespace Core;
use Core\Application;

class Router {

    static function getFullPath($path) {
        return APP_ROOT_DIR . $path;
    }
    private function getConfig() {

        // FIXME - we will use it in the future to allow better rotung mechanizm, as in symfony
        static $config;
        if($config) {
            return $config;
        }

        // hard coded for now
        $files = array();
        $files[] = APP_ROOT_DIR . 'config/routing/main.json';


       // foreach($files as $file) {
        $config = json_decode(file_get_contents(self::getFullPath('config/routing/main.json')));
        return $config;
       // }

    }

    public function getRoute($server) {
        $pathInfo = substr($server['PATH_INFO'],1);
        $pieces = explode('/', $pathInfo);
        $ret = array();

        if(empty($pieces[0])){
            $ret['class'] = 'Main';
            $ret['action'] = 'indexAction';
            return $ret;
        }

        $ret['class'] = ucfirst($pieces[0]);
        $ret['action'] = !empty($pieces[1]) ? $pieces[1].'Action' : 'indexAction';

        $ret['params'] = array_slice($pieces, 2);
        return $ret;

    }
    public function __construct() {

    }
}