<?php

namespace Core\Auth;

class Auth {
    public function checkLogin() {

    }
    public function login($username,$password) {
        $model = new \Models\users();
        $user = $model->loadUser($username,$password);
        if($user) {
            $_SESSION['user'] = $user->getId();
            return \Core\Helpers::jsonEncode(array('username' => $user->getUsername()));
        }


    }
    public function getLoginUser() {
        $model = new \Models\users();
        $user = new User();

        $cookies = isset(\Core\Application::$superGlobals['_SESSION']['user']) ? \Core\Application::$superGlobals['_SESSION']['user'] : '';
        if(empty($cookies)) {
            $user->setUsername('Anonymous');

        } else {
            $user = $user->loadByPk($cookies);
        }
        return $user;
    }

}
