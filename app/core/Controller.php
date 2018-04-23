<?php
class Controller
{
    // Method for Injecting model or Database
    public function model($model)
    {
        if(file_exists('../app/model/' . $model . '.php')){
            require_once '../app/model/' . $model . '.php';
            return new $model;
        }
    }

    public function redirect($url)
    {
        header("Location:" . $url);
    }

    // Method for Injecting view to the document
    public function view($view , $data = [])
    {
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }
        return $data;
    }
}