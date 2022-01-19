<?php
use frameworkVendor\core\Router;

error_reporting(-1);

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('LAYOUT', 'default');

spl_autoload_register(function ($class){
    $file = dirname(__DIR__) . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_file($file)){
        require_once $file;
    }
});

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);

Router::add('^logout', ['controller' => 'Login', 'action' => 'logout']);
Router::add('^register', ['controller' => 'Login', 'action' => 'register']);
Router::add('^signin', ['controller' => 'Login', 'action' => 'signin']);

Router::add('^save', ['controller' => 'Login', 'action' => 'save']);
Router::add('^check', ['controller' => 'Login', 'action' => 'check']);

Router::add('^add', ['controller' => 'DownloadFiles', 'action' => 'add']);
Router::add('^show', ['controller' => 'DownloadFiles', 'action' => 'show']);

Router::dispatch($query);