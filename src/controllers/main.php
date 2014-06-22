<?php
namespace Controllers;

class Main extends \Core\controller{
    public function indexAction() {


        $auth = new \Core\Auth\Auth();
        $user = $auth->getLoginUser();


        $params['user'] = $user->getUsername();
        $params['title'] = 'Homepage';
        $this->render('index.tpl',$params);

    }
}