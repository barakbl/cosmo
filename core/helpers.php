<?php

namespace Core;


class Helpers {
    static function getFullPath($path) {
        return APP_ROOT_DIR . $path;
    }


    static function jsonDecode($obj) {
        return json_decode($obj);
    }

    static function jsonEncode($obj) {
        return json_encode($obj);
    }

    /**
     * @static get app config
     * @return Object
     */
    static function config() {
        static $conf = '';
        if(empty($conf)) {
            $conf = file_get_contents(self::getFullPath('/config/app.json'));
        }
        return self::jsonDecode($conf);
    }

}