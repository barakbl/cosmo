<?php
namespace Controllers;

class Login extends \Core\controller{
    public function indexAction() {

        $auth = new \Core\Auth\Auth();


        $post = \Core\Application::$superGlobals['_POST'];
        $params = $auth->login($post['username'],$post['password']);
        if($params == "") {
            $params = "{}";
        }
        echo $params; // json, FIXME - change to use response

    }
}