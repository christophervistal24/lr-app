<?php
namespace App\Core;
class Controller
{

    public function redirect($url)
    {
        header("Location:" . $url);
    }

    // Method for Injecting view to the document
    public function view($view , $data = [])
    {
        if(file_exists(APP['URL_ROOT'] . 'app/views/' . $view . '.php')){
            require_once  APP['URL_ROOT'] . 'app/views/' . $view . '.php';
        }
    }
}