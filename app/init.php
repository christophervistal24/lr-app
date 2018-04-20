<?php
require_once 'core/App.php';
require_once 'core/Controller.php';
spl_autoload_register(function($class){
    if(preg_match('/\A\w+\Z/', $class)) {
      include('model/' . $class . '.php');
    }
});

$database = new Database;
// Bootstrapping , Creating new Instance
$app = new App;

