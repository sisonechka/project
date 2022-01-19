<?php

namespace app\models;

use frameworkVendor\core\base\Model;

class User extends Model
{
    public $table = 'users';

    public function insertUser($username, $email, $pass)
    {

        $sql = "INSERT INTO users (username, email, password) 
                      VALUES ('$username','$email', '$pass')";
        $this->pdo->query($sql);
        return true;
    }
    public function checkUser($username, $pass)
    {
        $sql = "SELECT * FROM users WHERE username='$username' 
                      and password='$pass'";
        if($this->pdo->query($sql)) {
            return true;
        }
    }
}