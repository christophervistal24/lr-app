<?php
session_start();
define('LR_APP',str_replace(DIRECTORY_SEPARATOR, "/",dirname(__DIR__)));
define('APP',LR_APP . '/app');


require_once APP . '/libraries/vendor/autoload.php';
require_once APP . '/libraries/phpmailer/PHPMailerAutoload.php';


/**
 * Load all the class in core and model folder
 */
spl_autoload_register(function($class){
    $source_files = [
        "/core/$class.php",
        "/model/$class.php",
    ];

    foreach ($source_files as $source) {
        if(file_exists(APP . $source)){
            require APP . $source;
        }
    }

});


$database = new Database;
$Util     = new Utilities;
$Admin    = new Admin;
$File     = new File;



