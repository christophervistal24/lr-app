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
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/templates/header.php';
            require_once '../app/views/' . $view . '.php';
            require_once '../app/views/templates/footer.php';
            extract($data);
        }
    }
}