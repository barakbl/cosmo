<?php

namespace Core\Auth;


class User {
    protected $username,$password,$email,$phone,$id;

    public function loadByPk($id) {

        $model = new \Models\users();
        $user = $model->getByPk('users',$id)[0];
        if($user) {
            $this->setEmail($user['email']);
            $this->setUsername($user['username']);
            $this->setId($id);
            return $this;
        }

    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

}