<?php

namespace app\controllers;

use frameworkVendor\core\base\Controller;
use app\models\User;

class Login extends Controller
{
    public function logout()
    {
        header('Location: /');
    }
    public function register()
    {
        $title = 'Register';
        $this->set(compact('title'));
    }
    public function save()
    {
        $model = new User;
        $res = $model->insertUser($_POST['username'], $_POST['email'],$_POST['password']);

        if($res){
            $titleRes= "Registration is complete!";
        }else{
            $titleRes= "Error";
        }
        $this->set(compact('titleRes'));
    }

    public function signin()
    {
        $title = 'Login';
        $this->set(compact('title'));
    }
    public function check()
    {
        $model = new User;
        $res = $model->checkUser($_POST['username'], $_POST['password']);

        if($res){
            $result= "Hi, ".$_POST['username']."!";
            $this->set(compact('result'));

        }else{
            header('Location: /signin');
        }
    }
}