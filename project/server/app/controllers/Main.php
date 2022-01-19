<?php

namespace app\controllers;

use frameworkVendor\core\base\Controller;

class Main extends Controller
{

    public function index()
    {
        $title = 'Main paige';
        $this->set(compact( 'title'));
    }
}