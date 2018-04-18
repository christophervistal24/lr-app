<?php

class App
{
    // Default Controller and method
    protected $controller = 'page';
    protected $method       = 'index';
    protected $params     = [];

    public function __construct()
    {

        // Collect the values
        $url = $this->parse_url();

        //  Check if the controller exists
        if (file_exists('app/controller/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // Require the controller
        require_once '../app/controller/' . $this->controller . '.php';

        // Create new Instance of Controller
        $this->controller = new $this->controller;

        // Check if the method is set
        if(isset($url[1])){
            // Check if the method is exists in Page class or Controller Class
            if(method_exists($this->controller, $this->method)){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Check if the params have a value
        $this->params = $url ? array_values($url) : [];

        // Executing method from the Controller Class
        call_user_func_array([$this->controller,$this->method],$this->params);
    }

    public function parse_url()
    {
        if(isset($_GET['url'])){
            // Explode the value after the public/ in the url
            return $url = explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
        }
    }
}

