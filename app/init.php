<?php
define('LR_APP',dirname(__DIR__));

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Utilities.php';
require_once 'core/File.php';
require_once 'model/Database.php';
require_once LR_APP . '/app/libraries/phpmailer/PHPMailerAutoload.php';
spl_autoload_register(function($class){
    if(preg_match('/\A\w+\Z/', $class)) {
      include('model/' . $class . '.php');
    }
});


$database = new Database;
$Util  = new Utilities;
$Admin = new Admin;
$File  = new File;



