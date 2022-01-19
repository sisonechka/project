<?php

namespace frameworkVendor\core\base;

class View
{
    public $route = [];
    public $view;
    public $layout;

    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;
        if ($layout === false){
            $this->layout = false;
        }else{
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
    }

    public function render($data)
    {
        if (is_array($data)){
            extract($data);
        }

        $file_view = '/var/www/html/app' . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($file_view)){
            require $file_view;
        }else{
            echo "НЕ найдин вид <strong>$file_view</strong>";
        }
        $content = ob_get_clean();

        if (false !== $this->layout){
            $file_layout = "/var/www/html/app/views/layouts/{$this->layout}.php";
            if (is_file($file_layout)){
                require $file_layout;
            }else{
                echo "НЕ найдин шаблон <strong>$file_layout</strong>";
            }
        }
    }
}